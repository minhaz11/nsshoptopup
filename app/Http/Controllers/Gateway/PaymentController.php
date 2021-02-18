<?php

namespace App\Http\Controllers\Gateway;

use App\Order;
use Session;
use App\User;
use App\Deposit;
use App\Transaction;
use App\GeneralSetting;
use App\GatewayCurrency;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {

    }

    public function deposit()
    {
        $data['gatewayCurrency'] = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();
        $data['title'] = 'Deposit Methods';

        if(session('order_id')){
            $data['orderDetails'] = Order::where('order_id',session('order_id'))->first();
            $data['title'] = 'Payment Methods';
        }

        return view('frontend.payment.deposit', $data);
    }

    public function depositInsert(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'method_code' => 'required',
            'currency' => 'required',
        ]);



        $gate = GatewayCurrency::where('method_code', $request->method_code)->where('currency', $request->currency)->first();
        if (!$gate) {
            $notify[] = ['error', 'Invalid Gateway'];
            return back()->withNotify($notify);
        }

        if ($gate->min_amount > $request->amount || $gate->max_amount < $request->amount) {
            $notify[] = ['error', 'Please Follow Deposit Limit'];
            return back()->withNotify($notify);
        }

        $charge = getNumber($gate->fixed_charge + ($request->amount * $gate->percent_charge / 100));
        $payable = getNumber($request->amount + $charge);
        $final_amo = getNumber($payable * $gate->rate);

        $depo['user_id'] = 1;
        $depo['method_code'] = $gate->method_code;
        $depo['method_currency'] = strtoupper($gate->currency);
        $depo['amount'] = $request->amount;
        $depo['charge'] = $charge;
        $depo['rate'] = $gate->rate;
        $depo['final_amo'] = getNumber($final_amo);
        $depo['btc_amo'] = 0;
        $depo['btc_wallet'] = "";
        $depo['trx'] = Str::random(12);
        $depo['try'] = 0;
        $depo['status'] = 0;
        $data = Deposit::create($depo);
        session()->put('Track', $data['trx']);
        return redirect()->route('deposit.preview');
    }


    public function depositPreview()
    {

        $track = session()->get('Track');
        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->firstOrFail();
        if (is_null($data)) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }
        if ($data->status != 0) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }
        $title = 'Payment Preview';
        return view('frontend.payment.preview', compact('data', 'title'));
    }


    public function depositConfirm()
    {
        $track = Session::get('Track');
        $deposit = Deposit::where('trx', $track)->orderBy('id', 'DESC')->with('gateway')->first();
        if (is_null($deposit)) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }
        if ($deposit->status != 0) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }

        if ($deposit->method_code >= 1000) {
            $this->userDataUpdate($deposit);
            $notify[] = ['success', 'Your deposit request is queued for approval.'];
            return back()->withNotify($notify);
        }


        $dirName = $deposit->gateway->alias;
        $new = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';

        $data = $new::process($deposit);
        $data = json_decode($data);


        if (isset($data->error)) {
            $notify[] = ['error', $data->message];
            return redirect()->route(gatewayRedirectUrl())->withNotify($notify);
        }
        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }

        // for Stripe V3
        if(@$data->session){
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        }

        $title = 'Payment Confirm';
        return view('frontend.payment.' . $data->view, compact('data', 'title', 'deposit'));
    }


    public static function userDataUpdate($trx)
    {
        $gnl = GeneralSetting::first();
        $data = Deposit::where('trx', $trx)->first();
        if ($data->status == 0) {
            $data['status'] = 1;
            $data->update();

            $user = User::find($data->user_id);
            $user->balance += $data->amount;
            $user->save();

            $gateway = $data->gateway;



            $transaction = new Transaction();
            $transaction->user_id = $data->user_id;
            $transaction->amount = $data->amount;
            $transaction->post_balance = getAmount($user->balance);
            $transaction->charge = getAmount($data->charge);
            $transaction->trx_type = '+';
            $transaction->details = 'Deposit Via ' . $gateway->name;
            $transaction->trx = $data->trx;
            $transaction->save();

            // notify($user, 'DEPOSIT_COMPLETE', [
            //     'method_name' => $data->gateway_currency()->name,
            //     'method_currency' => $data->method_currency,
            //     'method_amount' => getAmount($data->final_amo),
            //     'amount' => getAmount($data->amount),
            //     'charge' => getAmount($data->charge),
            //     'currency' => $gnl->cur_text,
            //     'rate' => getAmount($data->rate),
            //     'trx' => $data->trx,
            //     'post_balance' => getAmount($user->balance)
            // ]);


        }
    }

    public function manualDepositConfirm()
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return redirect()->route(gatewayRedirectUrl());
        }
        if ($data->status != 0) {
            return redirect()->route(gatewayRedirectUrl());
        }
        if ($data->method_code > 999) {

            $page_title = 'Deposit Confirm';
            $method = $data->gateway_currency();
            return view($this->activeTemplate . 'user.manual_payment.manual_confirm', compact('data', 'page_title', 'method'));
        }
        abort(404);
    }

    public function manualDepositUpdate(Request $request)
    {
        $track = session()->get('Track');
        $data = Deposit::with('gateway')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return redirect()->route(gatewayRedirectUrl());
        }
        if ($data->status != 0) {
            return redirect()->route(gatewayRedirectUrl());
        }

        $params = json_decode($data->gateway_currency()->gateway_parameter);

        $rules = [];
        $inputField = [];
        $verifyImages = [];

        if ($params != null) {
            foreach ($params as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], 'mimes:jpeg,jpg,png');
                    array_push($rules[$key], 'max:2048');

                    array_push($verifyImages, $key);
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }


        $this->validate($request, $rules);


        $directory = date("Y")."/".date("m")."/".date("d");
        $path = imagePath()['verify']['deposit']['path'].'/'.$directory;
        $collection = collect($request);
        $reqField = [];
        if ($params != null) {
            foreach ($collection as $k => $v) {
                foreach ($params as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {
                                try {
                                    $reqField[$inKey] = [
                                        'field_name' => $directory.'/'.uploadImage($request[$inKey], $path),
                                        'type' => $inVal->type,
                                    ];
                                } catch (\Exception $exp) {
                                    $notify[] = ['error', 'Could not upload your ' . $inKey];
                                    return back()->withNotify($notify)->withInput();
                                }
                            }
                        } else {
                            $reqField[$inKey] = $v;
                            $reqField[$inKey] = [
                                'field_name' => $v,
                                'type' => $inVal->type,
                            ];
                        }
                    }
                }
            }
            $data->detail = $reqField;
        } else {
            $data->detail = null;
        }



        $data->status = 2; // pending
        $data->update();

        $gnl = GeneralSetting::first();
        notify($data->user, 'DEPOSIT_REQUEST', [
            'method_name' => $data->gateway_currency()->name,
            'method_currency' => $data->method_currency,
            'method_amount' => getAmount($data->final_amo),
            'amount' => getAmount($data->amount),
            'charge' => getAmount($data->charge),
            'currency' => $gnl->cur_text,
            'rate' => getAmount($data->rate),
            'trx' => $data->trx
        ]);

        $notify[] = ['success', 'You have deposit request has been taken.'];
        return redirect()->route('user.deposit.history')->withNotify($notify);
    }


}

<?php

namespace App\Http\Controllers;

use App\GcardItem;
use App\Items;
use App\Package;
use App\ItemType;
use App\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function itemDetails($slug,$id)
    {
        $data['title'] = 'Item Details';
        $data['type'] = ItemType::with('item')->findOrFail($id);
        return view('frontend.itemDetails',$data);
    }

    public function itemOrder(Request $request)
    {

        // $request->validate([
        //     'gmail' => 'required_if:account_type,gmail|email',
        //     'g_password' => 'required_if:account_type,gmail|email',
        //     'fb_number' => 'required_if:account_type,facebook',
        //     'fb_password' => 'required_if:account_type,facebook',
        // ]);

        $pkg = Package::findOrFail($request->pkg_id);
        $order_id = Str::random(12);
        $data['order_id'] = $order_id;
        $data['acc_type'] = $request->account_type;
        $data['username'] = $request->gmail ? $request->gmail : $request->fb_number;
        $data['password'] = $request->g_password ? $request->g_password : $request->fb_password;
        $data['player_id'] = $request->p_id??null;
        $data['amount'] = $pkg->price;
        $data['qty'] = $pkg->qty;
        $data['attribute'] = $pkg->attribute;
        Order::create($data);
        session()->put('order_id',$order_id);
        return redirect(route('payment'));
    }

    public function payment()
    {
        $data['title'] = 'Payments';
        $data['orderDetails'] = Order::where('order_id',session('order_id'))->first();
        session()->forget('order_id');
        return view('frontend.payment',$data);
    }

    public function giftcardItems($slug,$id)
    {
        $data['title'] = 'Giftcard items';
        $data['cardItems'] = GcardItem::where('card_id',$id)->where('status',1)->latest()->get();
        return view('frontend.cardItems',$data);
    }

}

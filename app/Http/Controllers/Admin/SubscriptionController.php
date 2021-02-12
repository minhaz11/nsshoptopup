<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function all()
    {
        $title = "All subscription";
        $subscription = Subscription::latest()->paginate(15);
        return view('admin.subscription.list',compact('title','subscription'));
    }

    public function store(Request $request,$id = null)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);

        if($id==null){
           $subscription = Subscription::firstOrNew(['created_at'=>now()]);
        } else {
            $subscription = Subscription::firstOrNew(['id'=>$id]);
        }

        $subscription->title = $request->title;
        $subscription->price = $request->price;
        $subscription->discount = $request->discount;
        $subscription->duration = $request->duration;
        $subscription->status = isset($request->status) ? 1 : 0;

        $subscription->save();
        return back()->with('success','Subscription added successfully');
    }




}

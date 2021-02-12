<?php

namespace App\Http\Controllers\Admin;

use App\GiftCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    public function giftcards()
    {
        $data['title'] = 'Giftcards';
        $data['giftcards'] = GiftCard::latest()->paginate(15);
        return view('admin.giftcard.giftcards',$data);
    }

    public function store(Request $request,$id=null)
    {
       
        $request->validate([
            'name'=>'required',
            'image' => 'image|mimes:png,jpg,JPG,PNG,jpeg|max:5048'
        ]);
        if($id==null){
            $giftcard = GiftCard::firstOrNew(['created_at'=>now()]);
            $msg = 'Giftcard added successfully';
         } else {
            $giftcard = GiftCard::firstOrNew(['id'=>$id]);
            $msg = 'Giftcard updated successfully';
         }
         $giftcard->name = $request->name;
         if($request->image){
             $old = $giftcard->image ?? null;
             $giftcard->image = imageUpload($request->image,'public/assets/admin/img/giftcard/','200x200',$old);
         }
         $giftcard->save();
         return back()->with('success',$msg);


    }
}

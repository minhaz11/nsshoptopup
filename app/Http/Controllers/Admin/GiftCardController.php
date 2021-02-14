<?php

namespace App\Http\Controllers\Admin;

use App\CodeItem;
use App\GcardItem;
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
         $giftcard->status = $request->status ? 1:0;
         if($request->image){
             $old = $giftcard->image ?? null;
             $giftcard->image = imageUpload($request->image,'public/assets/admin/img/giftcard/','200x200',$old);
         }
         $giftcard->save();
         return back()->with('success',$msg);


    }



    public function cardItems($id)
    {
        $data['title'] = 'Card Items';
        $data['cardItems'] = GcardItem::whereCardId($id)->latest()->paginate(15);
        $data['card_id'] = $id;
        return view('admin.giftcard.cardItems',$data);
    }

    public function cardItemStore(Request $request,$id = null)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric|gt:0',
            'qty'   => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gte:0',
            'image' => 'image|mimes:png,jpg,JPG,PNG,jpeg|max:5045'
        ]);

        if($id==null){
            $cardItem = GcardItem::firstOrNew(['created_at'=>now()]);
            $msg = 'Giftcard item added successfully';
         } else {
            $cardItem = GcardItem::firstOrNew(['id'=>$id]);
            $msg = 'Giftcard item updated successfully';
         }
         $cardItem->title = $request->title;
         $cardItem->card_id = $request->card_id;
         $cardItem->price = $request->price;
         $cardItem->qty  = $request->qty;
         $cardItem->attribute  = $request->attribute;
         $cardItem->stock = $request->stock;
         $cardItem->status = $request->status ? 1 : 0;
         if($request->image){
             $old = $cardItem->image??null;
             $cardItem->image = imageUpload($request->image,'public/assets/admin/img/giftcard/item/','200x200',$old);
         }
         $cardItem->save();
         return back()->with('success',$msg);


    }

    public function cardItemRemove($id)
    {
        $cardItem = GcardItem::findOrFail($id);
        CodeItem::where('card_item_id',$id)->delete();
        $cardItem->delete();
        return back()->with('success','Item removed');

    }

    public function cardItemCodes($id)
    {
        $data['title'] = 'Item codes';
        $data['codes'] = CodeItem::where('card_item_id',$id)->latest()->paginate();
        $data['item_id'] = $id;
        return view('admin.giftcard.codeItems',$data);
    }

    public function codeStore(Request $request, $id=null)
    {
        $request->validate([
            'code' => 'required',
            'code.*' => 'required'
        ]);

        if($id == null){
            foreach($request->code as $code){
                $data['code'] = $code;
                $data['card_item_id'] = $request->item_id;
                CodeItem::create($data);
            }
            $msg = 'Code Added successfully';
        } else {
            $code = CodeItem::findOrFail($id);
            $code->code = $request->code;
            $code->update();
            $msg = 'Code Updated successfully';
        }

        return back()->with('success',$msg);
    }

    public function codeRemove($id)
    {
        $code = CodeItem::findOrFail($id)->delete();
        return back()->with('success','Code removed');
    }

}

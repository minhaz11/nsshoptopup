<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Items;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function items()
    {
        $title = "Items";
        $items = Items::latest()->paginate(15);
        return view('admin.item.items',compact('items'));
    }

    public function itemAdd()
    {
        $title = "Add item";
        $categories = Category::all();
        return view('admin.item.addItem',compact('title','categories'));
    }

    public function itemStore(Request $request,$id=null)
    {
        $request->validate([
            'item_name' => 'required',
            'details' => 'required',
            'image' => 'image'
        ]);

        if($id==null){
            $item = Items::firstOrNew(['created_at'=>now()]);
            $msg = 'Item added successfully';
         } else {
            $item = Items::firstOrNew(['id'=>$id]);
            $msg = 'Item updated successfully';
         }

         $item->code = str_replace(' ', '', $request->item_name).Str::random(6);
         $item->item_name = $request->item_name;
         $item->details = $request->details;
         $item->apple_store = $request->apple_store;
         $item->play_store = $request->play_store;
         $item->status = $request->status ? 1:0;
         if($request->image){
            $old = $item->image??null;
            $item->image = imageUpload($request->image,'public/assets/admin/img/item/','410x550',$old,'320x180');
         }
         $input_form = [];
         if ($request->has('field_name')) {
             for ($a = 0; $a < count($request->field_name); $a++) {

                 $arr = array();
                 $arr['field_name'] = strtolower(str_replace(' ', '_', $request->field_name[$a]));
                 $arr['field_level'] = $request->field_name[$a];
                 $arr['type'] = $request->type[$a];
                 $arr['validation'] = $request->validation[$a];
                 $input_form[$arr['field_name']] = $arr;
             }
         }
         $item->additional = $input_form;
         $item->save();
         return back()->with('success',$msg);
    }

    public function itemEdit($id)
    {
        $title = 'Update Item';
        $item = Items::findOrFail($id);
        $categories = Category::all();
        return view('admin.item.updateItem',compact('title','item','categories'));
    }

    public function itemRemove($id)
    {
        Items::findOrFail($id)->delete();
        return back()->with('info','Item has been removed');

    }

}

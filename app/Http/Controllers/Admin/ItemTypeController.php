<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Items;
use App\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function itemTypes()
    {
        $data['title'] = 'Item Types';
        $data['types'] = ItemType::latest()->paginate(15);
        return view('admin.itemType.types', $data);
    }

    public function addItemTypes()
    {
        $data['title'] = 'Add Item Types';
        $data['items'] = Items::get(['id','item_name']);
        return view('admin.itemType.addItemType', $data);
    }

    public function store(Request $request,$id=null)
    {
        $request->validate([
            'type_name' => 'required',
            'item_id'  => 'required'
        ]);

        if($id==null){
            $itemType = ItemType::firstOrNew(['created_at'=>now()]);
            $msg = 'Item type added successfully';
         } else {
            $itemType = ItemType::firstOrNew(['id'=>$id]);
            $msg = 'Item type updated successfully';
         }

         $itemType->type_name = $request->type_name;
         $itemType->item_id = $request->item_id;
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
         $itemType->additional = $input_form;
         $itemType->status = $request->status ? 1 : 0;
         $itemType->save();
         return back()->with('success',$msg);
    }

    public function edit($id)
    {
        $data['title'] = 'Update Item Type';
        $data['type'] = ItemType::findOrFail($id);
        $data['items'] = Items::get(['id','item_name']);
        return view('admin.itemType.updateItemType',$data);
    }

    public function remove($id)
    {
        $type =  ItemType::findOrFail($id)->delete();
        return back()->with('info','Type Has been removed');

    }
}

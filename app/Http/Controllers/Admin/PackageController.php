<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ItemType;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function packages()
    {
        $data['title'] = 'Packages';
        $data['packages'] = Package::latest()->paginate(15);
        $data['types'] = ItemType::get(['id','type_name']);
        return view('admin.packages.packages',$data);
    }

    public function store(Request $request,$id=null)
    {

        $request->validate([
            'item_type_id' => 'required',
            'qty'  => 'required|numeric',
            'attribute' => 'required',
            'price'  => 'required|numeric'

        ]);

        if($id==null){
            $package = Package::firstOrNew(['created_at'=>now()]);
            $msg = 'Package added successfully';
         } else {
            $package = Package::firstOrNew(['id'=>$id]);
            $msg = 'Package updated successfully';
         }

         $package->item_type_id = $request->item_type_id;
         $package->qty = $request->qty;
         $package->attribute = $request->attribute;
         $package->price = $request->price;
         $package->status = $request->status ? 1 : 0;
         $package->save();
         return back()->with('success',$msg);
    }
}

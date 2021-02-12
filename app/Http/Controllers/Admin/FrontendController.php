<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function banners()
    {
        $title = 'Banners';
        $banners = Banner::latest()->paginate(10);
        return view('admin.frontend.banner.banners',compact('title','banners'));
    }

    public function bannerCreate()
    {
        $title = 'Create Banner';
        return view('admin.frontend.banner.bannerAdd',compact('title'));
    }

    public function bannerStore(Request $request,$id = null)
    {
        $request->validate([
            'heading' => 'required',
            'short_details' => 'required',
            'link'  => 'required',
            'image' => 'image|max:2045'
        ]);


        if($id==null){
            $banner = Banner::firstOrNew(['created_at'=>now()]);
            $msg  = 'Banner added successfully';
         } else {
            $banner = Banner::firstOrNew(['id'=>$id]);
            $msg  = 'Banner updated successfully';
         }

        $banner->heading = $request->heading;
        $banner->short_details = $request->short_details;
        $banner->link = $request->link;

        if($request->image){
            $old = $banner->link ?? null;
            $banner->image = imageUpload($request->image,'public/assets/admin/img/banner/','1920x768',$old);
        }
        $banner->save();
        return back()->with('success', $msg);
    }

    public function bannerEdit($id)
    {
        $title = 'Edit Banner';
        $banner = Banner::findOrFail($id);
        return view('admin.frontend.banner.bannerUpdate',compact('title','banner'));
    }

    public function bannerRemove($id)
    {
         Banner::findOrFail($id)->delete();
         return back()->with('info', 'Banner has been removed');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $title ='Admin Dashboard';
        return view('admin.dashboard',compact('title'));
    }

    public function setting()
    {
        $data['title'] = 'Site Setting';
        $data['setting'] = Setting::first();
        return view('admin.setting',$data);
    }

    public function settingStore(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:JPG,PNG,png,jpg,jpeg|max:2048'
        ]);

        $setting = Setting::firstOrNew([]);
        $setting->sitename = $request->sitename;
        if($request->logo){
            $old = $setting->log??null;
            $setting->logo = imageUpload($request->logo,'public/assets/frontend/logo/','230x90',$old);
        }
        if($request->favico){
            $old = $setting->favico??null;
            $setting->favico = imageUpload($request->favico,'public/assets/frontend/favico/','60x60',$old);
        }
        $setting->save();
        return back()->with('success','Setting Updated');


    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
class SettingController extends Controller
{
    public function setting()
    {
        $data['title'] = 'Site Setting';
        return view('admin.setting',$data);
    }
    public function settingUpdate(Request $request)
    {
        $request->validate([
            'sitename' => 'required',
            'logo' => 'image|mimes:jpg,jpeg,png',
            'favicon' => 'image|mimes:png',
        ]);

        config(['setting.sitename.name' => $request->sitename]);

        if ($request->hasFile('logo')) {
            try {
                $path = config('setting.logo.path');
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                $size = explode('x', config('setting.logo.size'));
                Image::make($request->logo)->resize($size[0], $size[1])->save($path . '/logo.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Logo could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                $path = config('setting.favicon.path');
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                $size = explode('x', config('setting.favicon.size'));
                Image::make($request->favicon)->resize($size[0], $size[1])->save($path . '/favicon.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Favicon could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        return back()->with('success','Setting has been updated.');
    }
}

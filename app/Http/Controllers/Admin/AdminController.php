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

   


}

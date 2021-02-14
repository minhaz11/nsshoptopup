<?php

namespace App\Http\Controllers;

use App\Items;
use App\ItemType;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['itemTypes']  = ItemType::whereStatus(1)->latest()->take(8)->get();
        return view('frontend.landing',$data);
    }
}

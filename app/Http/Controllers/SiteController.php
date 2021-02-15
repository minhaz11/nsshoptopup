<?php

namespace App\Http\Controllers;

use App\Banner;
use App\GiftCard;
use App\Items;
use App\ItemType;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['itemTypes']  = ItemType::whereStatus(1)->latest()->take(8)->get();
        $data['banners']  = Banner::whereStatus(1)->latest()->get();
        $data['giftcards']  = GiftCard::whereStatus(1)->latest()->get();
        return view('frontend.landing',$data);
    }


    
}

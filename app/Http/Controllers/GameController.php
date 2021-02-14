<?php

namespace App\Http\Controllers;

use App\Items;
use App\ItemType;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function itemDetails($slug,$id)
    {
        $data['title'] = 'Item Details';
        $data['type'] = ItemType::with('item')->findOrFail($id);
        // $data['item'] = Items::findOrFail($data['type']->$id);
        return view('frontend.itemDetails',$data);
    }
}

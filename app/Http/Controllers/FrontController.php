<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class FrontController extends Controller
{
    public function shop()
    {
        $items = Item::all();
        //var_dump($items);
        return view('front.shops', compact('items'));
    }

    public function shopItem($id)
    {
        //echo $id;
        $item = Item::find($id);
        return view('front.shop-item',compact('item'));
    }
}

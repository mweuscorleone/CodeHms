<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Item_price;

class ItemsController extends Controller
{
    public function itemlist(){

        $items = Item::all();

        $itemList = $items->map(function($item){
           

            return [
                'Item' => $item->name,
                "Item type" => $item->item_type,
                "status" => $item->status 

            ];
        });

        return response()->json($itemList);

    }
    
}

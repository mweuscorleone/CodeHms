<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item_price;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Sponsor;
use Illuminate\Support\Facades\DB;

class ItempriceListController extends Controller
{
    public function pricelist(){
        $items = DB::table('item_prices')->join('items', 'item_prices.item_id', '=' ,'items.id')
        ->join('sponsors', 'item_prices.sponsor_id','=','sponsors.id')->leftJoin('employees', 'item_prices.employee_id', '=', 'employees.id')
        ->select(
            'items.id as item_id',
            'items.name as item_name',
            'sponsors.sponsor_name as sponsor_name',
            'items.item_type as item_type',
            'item_prices.price as item_price',
            'items.status as status',
            'employees.first_name',
            'employees.middle_name',
            'employees.last_name',
            'item_prices.updated_at as updated_at'
        )->get();

        $report = $items->map(function ($item){
            $employeeFullName = $item->first_name ? 
                trim($item->first_name . ' '. $item->middle_name . ' ' . 
                $item->last_name) : 'NA';

                return [
                    'Item ID' => $item->item_id,
                    'Item Name' => $item->item_name,
                    'Sponsor' => $item->sponsor_name,
                    'Item Type' => $item->item_type,
                    'Price' => $item->item_price,
                    'Status' => $item->status,
                    'Action' => $item->updated_at ? "Updated" : "Not Updated",
                    'Updated By' => $employeeFullName,
                    'Updated at' => $item->updated_at

                ];

               
        });
         return response()->json($report);
    }
}

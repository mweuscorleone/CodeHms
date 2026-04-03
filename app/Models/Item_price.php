<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item_price extends Model
{   use hasFactory;
    protected $fillable = [
         'item_id', 'sponsor_id', 'price', 'employee_id'
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function sponsors(){
        return $this->belongsTo(Sponsor::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_Id');
    }
}

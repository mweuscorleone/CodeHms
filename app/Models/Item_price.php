<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item_price extends Model
{   use hasFactory;
    protected $fillable = [
         'item_id', 'sponsor_id', 'price'
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function sponsors(){
        return $this->hasMany(Sponsor::class);
    }
}

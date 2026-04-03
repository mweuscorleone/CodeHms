<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{   use HasFactory;
    
    protected $fillable = [
         'sponsor_name', 'sponsor_type', 'status'
    ];
    public function item_prices(){
        return $this->hasMany(Item_price::class);
    }
    public function patient(){
        return $this->hasMany(Patient::class);
    }
}

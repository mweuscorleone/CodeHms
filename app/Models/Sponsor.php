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
        return $this->belongsTo(Item_price::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}

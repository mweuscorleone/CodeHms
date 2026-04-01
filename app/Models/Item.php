<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name','item_type', 'IsconsultationItem', 
        'is_stock_item', 'status'
    ];

    public function item_prices(){
        return $this->hasMany(Item_price::class);
    }
    public function service_requests(){
        return $this->hasMany(ServiceRequest::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function reception_billings(){
        return $this->hasMany(ReceptionBilling::class);
    }
}   

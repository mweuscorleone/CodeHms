<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'patient_id', 'item_id', 'sponsor_id', 'consultation_type', 'payment_dateTime',
        'performed_by', 'status', 'amount'
    ];
    public function items(){
        return $this->belongsTo(Item::class, 'item_id');

    }
    public function sponsors(){
        return $this->belongsTo(Sponsor::class, 'sponsor_id');
    }
    public function employees(){
        return $this->belongsTo(Employee::class, 'performed_by');
    }
    public function patients(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

}

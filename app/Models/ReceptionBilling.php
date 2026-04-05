<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceptionBilling extends Model
{   use hasFactory;
    
    protected $fillable = [
        'patient_id', 'billing_type', 'sponsor_id', 'clinic_id',
        'check_in_id', 'item_id', 'amount', 'employee_id'
    ];

    public function patients(){
        return $this->belongsTo(Patient::class);
    }
    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }
    public function clinics(){
        return $this->belongsTo(Clinic::class);
    }
    public function checkins(){
        return $this->belongsTo(CheckIn::class);
        
    }
    public function items(){
        return $this->belongsTo(Item::class);
    }
    public function employees(){
        return $this->belongsTo(Employee::class);
    }
}

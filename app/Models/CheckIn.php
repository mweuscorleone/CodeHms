<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'visit_date', 'employee_id', 'visit_type_id', 'check_in_datetime'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function visits(){
        return $this->belongsTo(Visit::class);
    }
    public function receptionBillings(){
        return $this->hasMany(ReceptionBilling::class);
    }
}

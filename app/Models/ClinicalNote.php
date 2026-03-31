<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicalNote extends Model
{
    protected $fillable = [
        'patient_id', 'visit_id', 'complaints', 'history',
        'provisonal_diagnosis', 'final_diagnosis'
    ];
    public function patients(){
        return $this->belongsTo(Patient::class);
    }
    public function visits(){
        return $this->belongsTo(Visit::class);

    }
    public function service_requests(){
        return $this->hasMany(ServiceRequest::class);
    }
}


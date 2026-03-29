<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{ use hasFactory;
    protected $fillable = [
        'patient_id',
        'VistType',
        'checked_in'
    ];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function checkin(){
        return $this->hasMany(CheckIn::class);
    }
}

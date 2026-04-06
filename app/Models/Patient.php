<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{   use HasFactory;
    
    protected $fillable = [
        'first_name', 'last_name', 'date_of_birth', 'sponsor_id', 'gender', 'phone', 'address',
        'relative_name', 'relationship', 'relative_phone', 'relative_address', 'created_by', 'updated_by'

    ];

    protected $dates = [
        'date_of_birth',
        'created_at',
        'updated_at'
    ];
    public function visits(){
        return $this->hasMany(Visit::class);
    }
    public function sponsor(){
        return $this->belongsTo(Sponsor::class, 'sponsor_id');
    }
    public function checkIn(){
        return $this->hasMany(CheckIn::class);

    }
    public function clinicalNotes(){
        return $this->hasMany(ClinicalNote::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class, 'created_by');
    }
    public function receptionBillings(){
        return $this->hasMany(ReceptionBilling::class);
    }
    
}

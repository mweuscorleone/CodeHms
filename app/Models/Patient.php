<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{   use HasFactory;
    
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'phone', 'address',
        'relative_name', 'relationship', 'relative_phone', 'relative_address', 'payment_sponsor'
    ];
    public function visits(){
        return $this->hasMany(Visit::class);
    }
    public function sponsor(){
        return $this->hasMany(Sponsor::class);
    }
    public function checkIn(){
        return $this->hasMany(CheckIn::class);
    }
}

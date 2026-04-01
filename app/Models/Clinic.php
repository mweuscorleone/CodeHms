<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = [
        'clinic_name', 'clinic_nature', 'status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clinic extends Model
{   
    use hasFactory;
    protected $fillable = [
        'clinic_name', 'clinic_nature', 'status'
    ];
}

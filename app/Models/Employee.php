<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiToken;

class Employee extends Model
{  use HasFactory;
    use HasApiToken;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'username', 'phone', 'title', 'password'];


    protected $hidden = [
        'password'
    ];
}

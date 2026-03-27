<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{  use HasFactory;
    use HasApiTokens;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'username', 'phone', 'title', 'password'];


    protected $hidden = [
        'password',
        'remember_token',
    ];
    // protected function casts():array{
    //     return[
    //         'password' => 'hashed',
    //     ];
    // }
}

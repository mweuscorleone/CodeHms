<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticable
{  use HasFactory;
    use HasApiTokens;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'username', 'phone', 'title', 'password'];


    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts():array{
        return[
            'password' => 'hashed',
        ];
    }
    public function checkin(){
        return $this->hasMany(CheckIn::class);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $employee = Employee::where('usename', $request->username)->first();
        if(!$employee || $Hash::check($request->password, $employee->password)){
            return response()->json([
                'message' => "Invalidi credentials"
            ], 401);
        }

        $token = $employee->createToken('auth_token')->plainTextToken;

        return response()->json([
            'employee' => $employee,
            'token' => $token
        ]);
    }
}

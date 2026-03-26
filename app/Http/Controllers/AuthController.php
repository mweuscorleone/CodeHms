<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        try{
            //1. Validate Input
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string'
            ]);
            //2. Database Query 
            $employee = Employee::where('username', $request->username)->first();
            //3. Credential checck
            if(!$employee || !Hash::check($request->password, $employee->password)){
                return response()->json([
                    'status' => "error",
                    'message' => "Invalid username or password"
                ], 401);
            }
            //4. Token Generation
            $token = $employee->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => "success",
                'employee' => $employee,
                'token' => $token
            ]);

        }
        catch(QueryException $e){
            //Handles Database-specific errors (connection down, column not found)
            Log::error('Database Error during login: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Database connection issue. Please contact the ICT unit'
            ], 500);
        }
        catch(Exception $e){
            //Handles any other unexpected controller/logic errror
            Log::error('General logic Error: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later'
            ], 500);

        } 
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successfully!'
        ]);
    }
    

}

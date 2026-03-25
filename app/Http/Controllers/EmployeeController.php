<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function store(Request $request){

        //1. Validate: If this fails sends a 422 error automatically

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|unique:employees,username',
            'phone' =>  'required',
            'title' => 'required|in:doctor,nurse,receptionist,cashier,laboratory,radiology,pharmacist',  
        ]);

        //2. Logic for password

        $password = $request->password ?? $request->phone;
        //3. create the employee
        $employee = Employee::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'title' => $request->title,
            'password' => Hash::make($password),
        ]);

        //4. Return success message and employee data
        return response()->json([
            'message' => 'Employee created successfully!',
            'data' => $employee], 201);//201 means created
    }
}

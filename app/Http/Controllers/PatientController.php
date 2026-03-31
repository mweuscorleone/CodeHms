<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;

class PatientController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'gender' => 'required|in:male,female',
            'sponsor_id' => 'required',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
            'relative_name' => 'required|string|max:255',
            'relative_phone' => 'required|string',
            'relationship' => 'required',
            'relative_address' => 'required',
            
        
        ]);

        $data['created_by'] = Auth::id() ?? $request->created_by ?? 1;

        $patient = Patient::create($data);

        $employeeName = Auth::user() ? : Auth::user()->name = "system admin";

        return response()->json([
            'status' => 'success',
            'message' => 'Patient registered by' . $employeeName,
            'patient' => $patient
        ], 201);
    }   
}

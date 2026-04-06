<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\CheckIn;

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

        $employeeName = Auth::user() ? Auth::user()->name :   "system admin";

        return response()->json([
            'status' => 'success',
            'message' => 'Patient registered by ' . $employeeName,
            'patient' => $patient
        ], 201);
    }

    //patient checkin

    public function checkin(Request $request){
        //validate

        $data = $request->validate([
            'patient_id' => 'required|integer',
            'visit_date' => 'required|date',
            'employee_id' => 'required|integer',
            'visit_type_id' => 'required|integer'
        ]);

        $checkinDetail = CheckIn::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'patient checked in successfully!',
            'check in details' => $checkinDetail
        ]);
    }

    public function update(Request $request, $id){
        //find patient 

        $patient = Patient::find($id);

        if(!$patient){
            return response()->json([
                'status' => 'error',
                'message' => 'patient not found'
            ], 404);
                        }
        //validate

        $request->validate([
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

        //updating

        $patient->first_name = $request->first_name;
        $patient->middle_name = $request->middle_name;
        $patient->last_name = $request->last_name;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->gender = $request->gender;
        $patient->sponsor_id = $request->sponsor_id;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->relative_name = $request->relative_name;
        $patient->relative_phone = $request->relative_phone;
        $patient->relationship = $request->relationship;
        $patient->relative_address = $request->relative_address;

        $patient->

       

        $patient->save();

        //response

        return response()->json([
            'status' => 'success',
            'message' => 'patient updated successfully!',
            'patient' => $patient
        ], 200);
        
        }

    public function destroy($id){

        $patient = Patient::find($id);

        if(!$patient){
            return response()->json([
                'status' => 'error',
                'message' => 'patient not found'
            ], 404);
        }

        $patient->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'patient deleted successfully!'

        ]);

    }


    
}

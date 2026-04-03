<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Employee;
use Carbon\Carbon;

class PatientRegistrationReportController extends Controller
{
    public function registrationReport(){

        $patients = Patient::with('employee', 'sponsor')->get();

        $report = $patients->map(function ($patient){
            $fullname = $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name;
            $age = Carbon::parse($patient->date_of_birth)->age;

            return [
                'fullname' => $fullname,
                'patient number' => $patient->id,
                'age' => $age,
                'gender' =>$patient->gender,
                'phone number' => $patient->phone,
                'sponsor' => $patient->sponsor ? $patient->sponsor->sponsor_name: 'NA',
                'address' => $patient->address,
                'relative name' => $patient->relative_name,
                'relationship' => $patient->relationship,
                'relative phone' => $patient->relative_phone,
                'relative address' => $patient->relative_address,
                'registration date' => $patient->created_at,
                'registered by' => $patient->employee ? $patient->employee->first_name . ' '. 
                                $patient->employee->middle_name . ' ' . $patient->employee->last_name : 'NA' 
            ];
            
            
        });

        return response()->json($report);
    }
}

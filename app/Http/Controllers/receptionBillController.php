<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceptionBilling;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Clinic;
use App\Models\Sponsor;
use App\Models\Patient;
use App\Models\CheckIn;
use Carbon\Carbon;





class receptionBillController extends Controller
{
     public function bills(Request $request){
        $data = $request->validate([
            'patient_id' => 'required|integer',
            'billing_type' => 'required',
            'sponsor_id' => 'required|integer',
            'clinic_id' => 'required|integer',
            'check_in_id' => 'required|integer',
            'item_id' => 'required|integer',
            'amount' => 'required',
            'employee_id' => 'required'
            
        ]);

        $receptionBill = ReceptionBilling::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Patient successfully sent to cashier',
            'bill_details' => $receptionBill
        ]);
    }

    public function patientsentToDoctorReport(){

        $patients = DB::table('reception_billings')->join('patients', 'reception_billings.patient_id', '=', 'patients.id')
            ->join('sponsors', 'reception_billings.sponsor_id', '=', 'sponsors.id')
            ->join('check_ins', 'reception_billings.check_in_id', '=', 'check_ins.id')
            ->join('clinics', 'reception_billings.clinic_id', '=', 'clinics.id')
            ->join('items', 'reception_billings.item_id', '=', 'items.id')
            ->join('employees', 'reception_billings.employee_id', '=', 'employees.id')
            ->select(
                'patients.id as patient_id',
                'patients.first_name as patient_first_name',
                'patients.middle_name as patient_middle_name',
                'patients.last_name as patient_last_name',
                'patients.date_of_birth as patient_date_of_birth',
                'sponsors.sponsor_name as sponsor_name',
                'check_ins.visit_date as patient_visit_date',
                'clinics.clinic_name as clinic_name',
                'items.name as item_name',
                'employees.first_name as employee_first_name',
                'employees.middle_name as employee_middle_name',
                'employees.last_name as employee_last_name',
                'reception_billings.amount as amount',
                'reception_billings.billing_type as billing_type'


                
            )->get();

        $report = $patients->map(function($patient){
            $patientFullName = $patient->patient_first_name ? 
                trim($patient->patient_first_name. ' '. $patient->patient_middle_name . ' ' . $patient->patient_last_name) : "NA";

            $employeeFullName = $patient->employee_first_name ? 
                trim($patient->employee_first_name . ' ' . $patient->employee_middle_name . ' '.  $patient->employee_last_name): "NA";

            $patientAge = Carbon::parse($patient->patient_date_of_birth)->age;
            $billingType = $patient->sponsor_name == 'CASH'? $patient->billing_type = 'cash' : 'credit';

            return [
                'Patient Number' => $patient->patient_id,
                'Patient Name' => $patientFullName,
                'Age' => $patientAge,
                'Sponsor' => $patient->sponsor_name,
                'Visit Date' => $patient->patient_visit_date,
                'Clinic' => $patient->clinic_name,
                'Item Name' => $patient->item_name,
                'Amout' => $patient->amount,
                'Billing Type ' => $billingType,
                'Sent by' => $employeeFullName


            ];

        });

        return response()->json($report);




    }
}



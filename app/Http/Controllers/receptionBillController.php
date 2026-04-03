<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceptionBilling;

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
}

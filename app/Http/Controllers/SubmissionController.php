<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;
use App\Models\Relative;
use App\Models\Insurance;


class SubmissionController extends Controller
{
    public function store(Request $request){
        $patientData = $request->validate([
            'hospital_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:50',
            'middle_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'identification_type' => 'required|in:0,1',
            'identification_number' => 'required|string|unique:patients',
            'phone_number' => 'required|numeric|digits_between:7,15',
            'gender'=> 'required|in:0,1',
            'date_of_birth'=>'required|date',
            'age'=>'nullable|integer',
            'relation'=>'required|in: 0,1',
            'active'=>'nullable|boolean',

            
        ]);
        $patientData['active'] = $request->has('active') ? true : false;

        // Create records in each table - stored in patient table
        $patient = Patient::create($patientData);


        $relativeData = $request->validate([
            'r_first_name' => 'required|string|max:50',
            'r_middle_name' => 'required|string|max:50',
            'r_last_name' => 'required|string|max:50',
            'r_identification_type' => 'required|in:0,1',
            'r_identification_number' => 'required|string|unique:relatives,r_identification_number',
            'r_phone_number' => 'required|numeric|digits_between:7,15', // Assuming phone number as string
            'r_gender' => 'required|in:0,1', // 0 = Female, 1 = Male
            'r_date_of_birth' => 'required|date',
            'r_age' => 'nullable|integer',
            'r_active' => 'required|boolean',
        
        ]);

        $relativeData['r_active'] = $request->has('r_active') ? true : false;
        
    $relativeData['patient_id'] = $patient->id; // Link relative to patient

    //dd($relativeData);
    Relative::create($relativeData);

    $insuranceData = $request->validate([
        'insurance_company'=>'required|in:0,1', //or string|max:255
        'network'=>'nullable|string|max:255', //or string|max:255
        'member_policy_number'=>'nullable|string|max:255',
        'status'=>'nullable|string',
        'class_type'=>'required||in:0,1', //string
        'name'=>'required|in:0,1',  //string|max:255
        'co_pay'=>'required|numeric',
        'co_ins'=>'nullable|numeric', //readonly and rquired? *nullable for now*
        'coverage_start_date'=>'required|date',
        'coverage_end_date'=>'required|date|after_or_equal:coverage_start_date',
    ]);
    // set default value
    if (!isset($insuranceData['co_ins'])) {
        $insuranceData['co_ins'] = 0;  
    }
    $insuranceData['patient_id'] = $patient->id;

    Insurance::create($insuranceData);

    return redirect('/')->with('success', 'Data saved to all tables!');
    }

    public function show()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        // Your existing submit logic here
    }

}


<?php

namespace App\Http\Controllers;
    use App\Models\Patient;
    use App\Models\Relative;
    use App\Models\Insurance;

use Illuminate\Http\Request;

class APIFormController extends Controller
{
        public function getAllPatients()
        {
            return response()->json(Patient::all(), 200);
        }
    
        public function getPatientById($id)
        {
            $patient = Patient::find($id);
            if (!$patient) {
                return response()->json(['message' => 'Patient not found'], 404);
            }
            return response()->json($patient, 200);
        }
    
        public function getAllRelatives()
        {
            return response()->json(Relative::all(), 200);
        }
    
        public function getRelativeById($id)
        {
            $relative = Relative::find($id);
            if (!$relative) {
                return response()->json(['message' => 'Relative not found'], 404);
            }
            return response()->json($relative, 200);
        }
    
        public function getAllInsurance()
        {
            return response()->json(Insurance::all(), 200);
        }
    
        public function getInsuranceById($id)
        {
            $insurance = Insurance::find($id);
            if (!$insurance) {
                return response()->json(['message' => 'Insurance record not found'], 404);
            }
            return response()->json($insurance, 200);
        }
    
}

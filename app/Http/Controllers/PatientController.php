<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required',
                'father_husband_name' => 'required',
                'disease' => 'required',
                'phone' => 'required|numeric',
                'email' => 'required|email',
                'dob' => 'required',
                'cnic' => 'required|numeric',
                'age' => 'required|numeric',
                'gender' => 'required',
                'material_status' => 'required',
                'relation' => 'required',
                'city' => 'required',
                'address' => 'required',
            ]);

            $patient = new Patient;
            $patient->name = $validateData['name'];
            $patient->father_husband_name = $validateData['father_husband_name'];
            $patient->phone = $validateData['phone'];
            $patient->email = $validateData['email'];
            $patient->disease = $validateData['disease'];
            $patient->dob = $validateData['dob'];
            $patient->cnic = $validateData['cnic'];
            $patient->age = $validateData['age'];
            $patient->gender = $validateData['gender'];
            $patient->material_status = $validateData['material_status'];
            $patient->relation = $validateData['relation'];
            $patient->city = $validateData['city'];
            $patient->address = $validateData['address'];

            $patient->save();
            return response()->json([
                'success' => true,
                'message' => 'Register successful',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

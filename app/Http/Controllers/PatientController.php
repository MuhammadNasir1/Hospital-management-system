<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
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
            $patient->added_by = session('user_det')['user_id'];
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
            $patientId = $patient->id;
            return response()->json([
                'success' => true,
                'message' => 'Register successful',
                'patientId' => $patientId,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function view()
    {
        $patients = Patient::all();
        $department = User::where('company', session('user_det')['company_id'])
            ->where('role', 'department')
            ->get();
        $all = [
            'patients' => $patients,
            'department' => $department,
        ];
        // return $data;
        return view('reception.patient', compact('all'));
    }
    public function print(string $id)
    {
        $printData = Patient::find($id);
        $company = User::where('id', session('user_det')['company_id'])
            ->first();

        $all = [
            'printData' => $printData,
            'company' => $company,
        ];
        // return $all;
        return view('reception.patient_detail', compact('all'));
    }
    public function token(string $id)
    {
        $printData = Patient::find($id);
        $company = User::where('id', session('user_det')['company_id'])
            ->first();

        $all = [
            'printData' => $printData,
            'company' => $company,
        ];
        // return $all;
        return view('reception.patient_detail', compact('all'));
    }
    public function delete(string $id)
    {
        $delPateint = Patient::find($id);
        $delPateint->delete();
        return redirect('../reception/patients');
    }

    public function fetch(string $id)
    {
        try {

            $doctor = User::where('company', session('user_det')['company_id'])
                ->where('role', 'doctor')
                ->where('department', $id)
                ->get();
            return response()->json(["messsage" => "data get successfully", "doctors" => $doctor], 200);
        } catch (\Exception $e) {
            return response()->json(["messsage" => $e->getMessage()], 500);
        }
    }
}

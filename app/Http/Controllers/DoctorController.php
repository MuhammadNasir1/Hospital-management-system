<?php

namespace App\Http\Controllers;

use App\Models\Aappointment;
use App\Models\Inventory;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function view()
    {
        $date = Carbon::now();
        if (session('user_det')['role'] == 'doctor') {
            $patients = Aappointment::where('date', $date->toDateString())
                ->where('status', 'unchecked')
                ->where('doctor_id', session('user_det')['user_id'])
                ->get();
            $checkedPatients = Aappointment::where('date', $date->toDateString())
                ->where('status', 'checked')
                ->where('doctor_id', session('user_det')['user_id'])
                ->get();
        } elseif (session('user_det')['role'] == 'admin') {
            $patients = Aappointment::where('date', $date->toDateString())
                ->where('status', 'unchecked')
                ->get();
            $checkedPatients = Aappointment::where('date', $date->toDateString())
                ->where('status', 'checked')
                ->get();
        }

        $medicine = Inventory::where('company_id', session('user_det')['company_id'])
            ->get();

        $allData = [];
        $allDataChecked = [];
        foreach ($patients as $data) {
            $patientData = Patient::where('id', $data->patient_id)->get();
            $allData[] =  $patientData;
        }
        foreach ($checkedPatients as $patient) {
            $checkedPatientData = Patient::where('id', $patient->patient_id)->get();
            $allDataChecked[] =  $checkedPatientData;
        }

        $data = [
            'patients' => $allData,
            'medicine' => $medicine,
            'checked' => $allDataChecked,
            'date' => $date->toDateString(),
        ];

        // return $data;

        return view('doctor.doctor', compact('data'));
    }
}

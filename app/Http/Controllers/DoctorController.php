<?php

namespace App\Http\Controllers;

use App\Models\Aappointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function view()
    {
        $date = Carbon::now();
        // return $date->toDateString();
        $patients = Aappointment::where('date', $date->toDateString())->where('status', 'unchecked')->where('doctor_id', session('user_det')['user_id'])->get();
        $allData = [];
        foreach ($patients as $data) {
            $patientData = Patient::where('id', $data->patient_id)->get();
            $allData[] =  $patientData;
        }
        $all = compact('allData');
        return $all;
    }
}

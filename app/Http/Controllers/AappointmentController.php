<?php

namespace App\Http\Controllers;

use App\Models\Aappointment;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AappointmentController extends Controller
{
    public function appoimtment(Request $request)
    {
        try {


            $validateData = $request->validate([
                'doctor' => 'required | string',
                'price' => 'required | numeric',
                'date' => 'required | string | date',
            ]);

            $appointment = new Aappointment;


            $appointment->receptionist_id = session('user_det')['user_id'];
            $appointment->patient_id = $request->patient;
            $appointment->doctor_id = $validateData['doctor'];
            $appointment->price = $validateData['price'];
            $appointment->status = 'unchecked';
            $appointment->date = $validateData['date'];
            $appointment->save();
            $appointmentId = $appointment->id;
            return response()->json([
                'success' => true,
                'message' => 'Register successful',
                'appointmentId' => $appointmentId,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function printToken(string $id)
    {
        $printData = Aappointment::find($id);
        $patientData = Patient::where('id', $printData->patient_id)
            ->first();
        $time = Carbon::now();

        $company = User::where('id', session('user_det')['company_id'])
            ->first();

        $all = [
            'printData' => $patientData,
            'company' => $company,
            'time' => $time,
        ];
        // return $all;
        return view('reception.token', compact('all'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Aappointment;
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
            $appointment->time = $validateData['date'];
            $appointment->save();
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

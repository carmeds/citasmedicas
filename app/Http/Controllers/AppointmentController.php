<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 5);

        $appointments = Appointment::with(['patient.user', 'doctor.user'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->paginate($perPage);

        return response()->json($appointments);
    }
}

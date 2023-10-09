<?php

namespace App\Http\Controllers;

use App\Models\BookAppointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getAppointments()
    {
        $appointments = BookAppointment::where('status', 'approved')->get();

        $jsonAppointments = json_encode($appointments);

        return $jsonAppointments;
    }

    public function create()
    {
        $appointments = BookAppointment::all();

        return view('modules.appointment.create', compact('appointments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required'],
            'date_appointment' => ['required'],
            'time_appointment' => ['required'],
        ]);

        $newAppointment = BookAppointment::create([
            'user_id' => auth()->user()->id,
            'category' => $validated['category'],
            'date_appointment' => $validated['date_appointment'],
            'time_appointment' => $validated['time_appointment'],
        ]);

        return redirect()->route('app-stat.index')->with('success', 'Appointment created successfully!');
    }
}

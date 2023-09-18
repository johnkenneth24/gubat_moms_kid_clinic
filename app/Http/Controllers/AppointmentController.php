<?php

namespace App\Http\Controllers;

use App\Models\BookAppointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $appointments = BookAppointment::all();

        $bookedAppointments = $appointments->where('status', 'booked');
        $todayAppointments = $appointments->where('date_appointment', date('Y-m-d'));
        $upcomingAppointments = $appointments->where('date_appointment', '>', date('Y-m-d'));
        // count appointments with the same time as the following time slots below
        $morningAppointments9 = $appointments->where('time_appointment', '==', '09:00:00')->count();
        $morningAppointments10 = $appointments->where('time_appointment', '==', '10:00:00')->count();
        $morningAppointments11 = $appointments->where('time_appointment', '==', '11:00:00')->count();
        $afternoonAppointments1 = $appointments->where('time_appointment', '==', '13:00:00')->count();
        $afternoonAppointments2 = $appointments->where('time_appointment', '==', '14:00:00')->count();
        $afternoonAppointments3 = $appointments->where('time_appointment', '==', '15:00:00')->count();

        // dd($morningAppointments9);
        $selectedDate = request()->get('date_appointment');
        $appointmentsOnSelectedDate = $appointments->where('date_appointment', $selectedDate);

// Check if there is already an appointment booked at the selected time
        $disabledTimeSlots = [];
        foreach ($appointmentsOnSelectedDate as $appointment) {
            $disabledTimeSlots[] = $appointment->time_appointment;
        }

        return view('modules.appointment.create', compact('appointments', 'bookedAppointments', 'todayAppointments', 'upcomingAppointments', 'morningAppointments9', 'morningAppointments10', 'morningAppointments11', 'afternoonAppointments1', 'afternoonAppointments2', 'afternoonAppointments3', 'disabledTimeSlots'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required'],
            'date_appointment' => ['required'],
            'time_appointment' => ['required'],
        ]);

        // convert validated time appointment to time format
        // $time = date('H:i:s', strtotime($validated['time_appointment']));

        $newAppointment = BookAppointment::create([
            'user_id' => auth()->user()->id,
            'category' => $validated['category'],
            'date_appointment' => $validated['date_appointment'],
            'time_appointment' => $validated['time_appointment'],
        ]);

        return redirect()->route('app-stat.index')->with('success', 'Appointment created successfully!');
    }
}

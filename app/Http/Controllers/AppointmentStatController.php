<?php

namespace App\Http\Controllers;

use App\Models\BookAppointment;

class AppointmentStatController extends Controller
{
    public function index()
    {
        $appointments = BookAppointment::where('user_id', auth()->user()->id)->get();

        return view('modules.appointment-status.index', compact('appointments'));
    }
}

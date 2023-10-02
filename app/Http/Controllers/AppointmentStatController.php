<?php

namespace App\Http\Controllers;

use App\Models\BookAppointment;

class AppointmentStatController extends Controller
{
    public function index()
    {
        $appointments = BookAppointment::where('user_id', auth()->user()->id)
        ->orderBy('date_appointment', 'desc')
        ->get();

        return view('modules.appointment-status.index', compact('appointments'));
    }

    public function cancelAppointment(BookAppointment $book_app)
    {
      $book_app->update([
        'status'=>'Cancelled Appointment'
      ]);

      return redirect()->route('app-stat.index')->with('success', 'The Appointment Request is cancelled!');
    }
}

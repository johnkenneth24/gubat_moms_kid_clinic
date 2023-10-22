<?php

namespace App\Http\Controllers;

use App\Models\BookAppointment;
use App\Mail\CancelledAppEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class AppointmentStatController extends Controller
{
    public function index()
    {
        $appointments = BookAppointment::where('user_id', auth()->user()->id)
        ->orderBy('date_appointment', 'desc')
        ->get();

        return view('modules.appointment-status.index', compact('appointments'));
    }

    public function cancelAppointment(Request $request, BookAppointment $book_app)
    {
      $validated = $request->validate([
        'reason_cancel'=> ['required'],
      ]);

      $book_app->update([
        'status'=>'Cancelled Appointment',
        'reason_cancel' => $validated['reason_cancel'],
      ]);

      Mail::to('gubatmomsandkidsclinic@gmail.com')->send(new CancelledAppEmail( $book_app));

      return redirect()->route('app-stat.index')->with('success', 'The Appointment Request is cancelled!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedEmail;
use App\Mail\CancelledEmail;

class AppRequestController extends Controller
{
    public function index()
    {
        $book_appointments = BookAppointment::whereIn('status', ['pending', 'Approved'])
        ->orderByRaw("FIELD(status, 'pending') DESC")
        ->orderBy('date_appointment', 'asc')
        ->orderBy('time_appointment', 'asc')
        ->get();

        return view('modules.app-request.index', compact('book_appointments'));
    }

    public function view(BookAppointment $book_app)
    {

      return view('modules.app-request.view', compact('book_app'));
    }

    public function approve(BookAppointment $book_app)
    {
        $book_app->update([
          'status' => 'Approved'
        ]);

        Mail::to($book_app->user->email)->send(new ApprovedEmail( $book_app));

        return redirect()->back()->with('success', 'The Appointment Request is approved!');
    }

    public function cancelBook(BookAppointment $book_app)
    {
      $book_app->update([
        'status'=>'Cancelled'
      ]);

      Mail::to($book_app->user->email)->send(new CancelledEmail( $book_app));

      return redirect()->route('app-request.index')->with('success', 'The Appointment Request is cancelled!');

    }
}

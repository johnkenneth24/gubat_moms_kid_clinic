<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;

class AppRequestController extends Controller
{
    public function index()
    {
        $book_appointments = BookAppointment::where('status', 'pending')->get();

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

        return redirect()->route('app-request.index')->with('success', 'The Appointment Request is approved!');
    }

    public function cancelBook(BookAppointment $book_app)
    {
      $book_app->update([
        'status'=>'Cancelled'
      ]);

      return redirect()->route('app-request.index')->with('success', 'The Appointment Request is cancelled!');

    }
}

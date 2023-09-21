<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Models\BookAppointment;
use App\Models\User;


class AppCheckupController extends Controller
{
  public function index()
  {
    $book_appointment = BookAppointment::where('status', 'Approved')
      // ->with('user')
      ->orderBy('date_appointment', 'asc')
      ->orderBy('time_appointment', 'asc')
      ->get();

    $walkinapp = WalkInAppointment::where('status', 'Approved')
      ->with('walkInPatient')
      ->orderBy('date_consultation', 'asc')
      ->orderBy('time_consultation', 'asc')
      ->get();

    dd($walkinapp);

    return view('modules.app-checkup.index', compact('book_appointment', 'walkinapp'));
  }
}

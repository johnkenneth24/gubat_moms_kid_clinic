<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Models\BookAppointmentConsult;
use App\Models\BookAppointment;
use App\Models\User;


class AppCheckupController extends Controller
{
  public function index()
  {
    $book_appointment = BookAppointment::where('status', 'Approved')
      ->orderBy('date_appointment', 'asc')
      ->orderBy('time_appointment', 'asc')
      ->get();

    $walkinapp = WalkInAppointment::with('walkInPatient')->where('status', 'Approved')
      ->orderBy('date_consultation', 'asc')
      ->orderBy('time_consultation', 'asc')
      ->get();

    // dd($walkinapp);

    return view('modules.app-checkup.index', compact('book_appointment', 'walkinapp'));
  }

  public function view(BookAppointment $book_app)
  {

    return view('modules.app-checkup.view', compact('book_app'));
  }

  public function preConsult(BookAppointment $book_app, Request $request)
  {
    $validated = $request->validate([
      'weight' => 'required',
      'height' => 'required',
      'blood_pressure' => 'required'
    ]);


      BookAppointmentConsult::create([
      'book_appointment_id' => $book_app->id,
      'weight' => $validated['weight'],
      'height' => $validated['height'],
      'blood_pressure' => $validated['blood_pressure']
    ]);

    return redirect()->route('app-checkup.index')->with('success','Pre-consult successfully!');

  }

  public function noShow(BookAppointment $book_app)
    {
      $book_app->update([
        'status'=>'Did not attend'
      ]);

      return redirect()->route('app-request.index')->with('success', 'The Appointment Request is cancelled!');

    }

  public function viewMedHistory(WalkInAppointment $walkin)
  {
    $gender = ['Male', 'Female'];

    $checkup = ['Vaccination', 'Baby Check-up'];
    $consult = ['Consultation'];

    $patient_appointment = WalkInAppointment::where('walk_in_patient_id', $walkin->walk_in_patient_id)->where('status', 'Checked up')->get();

    // dd($patient_appointment);

    return view('modules.app-checkup.view-medhistory', compact('patient_appointment', 'walkin', 'gender', 'checkup', 'consult'));
  }

  public function viewBookMedHistory(BookAppointment $book_app)
  {
    
  }

}

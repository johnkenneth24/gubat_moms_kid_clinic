<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Models\BookAppointmentConsult;
use App\Models\BookAppointment;
use App\Models\User;
use Carbon\Carbon;


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
        'status'=>'Did Not Attend'
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
    $gender = ['Male', 'Female'];

    $checkup = ['Vaccination', 'Baby Check-up'];
    $consult = ['Consultation'];

    $patient_book = BookAppointment::where('user_id', $book_app->user_id)->where('status', 'Checked up');

    return view('modules.app-checkup.book-app.view-med-history', compact('book_app', 'gender', 'checkup', 'consult', 'patient_book'));
  }

  public function consult(BookAppointment $book_app)
  {
    $gender = ['Male', 'Female'];

    $checkup = ['Vaccination', 'Baby Check-up'];
    $consult = ['Consultation'];

    $currentDate = Carbon::now();
    $age = $currentDate->diffInYears($book_app->user->birthdate->format('Y-m-d'));

    return view('modules.app-checkup.book-app.create', compact( 'age','checkup', 'consult', 'gender', 'book_app'));
  }

  public function consultBookStore(Request $request, BookAppointment $book_app)
  {
    $validated = $request->validate([
      'medication_intake' => 'nullable',
      'medical_history' =>'nullable',
      'vaccine_received' =>'nullable',
      'diagnosis' =>'nullable',
    ]);

    $book_app->bookAppConsult->update([
      'medication_intake' => $validated['medication_intake'],
      'medical_history' => $validated['medical_history'],
      'vaccine_received' => $validated['vaccine_received'],
      'diagnosis' => $validated['diagnosis'],
    ]);

    $book_app->update([
      'status' => "Checked Up",
    ]);

    return redirect()->route('patient-record.index')->with('success', ' Check Up Done!');
  }

}

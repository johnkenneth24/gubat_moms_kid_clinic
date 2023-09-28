<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Models\WalkInPatient;
use App\Models\WalkInConsultation;
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

  public function viewMedHistory(WalkInAppointment $walkin)
  {
    $gender = ['Male', 'Female'];

    $checkup = ['Vaccination', 'Baby Check-up'];
    $consult = ['Consultation'];

    $patient_appointment = WalkInAppointment::where('walk_in_patient_id', $walkin->walk_in_patient_id)->get();

    // dd($patient_appointment);

    return view('modules.app-checkup.view-medhistory', compact('patient_appointment', 'walkin', 'gender', 'checkup', 'consult'));
  }
}

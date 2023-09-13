<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;

class PatientRecordController extends Controller
{
    public function index()
    {
        $patient_record = WalkInAppointment::with('walkInConsult')
        ->where('status', 'Checked Up')
        ->orderBy('date_consultation', 'desc')
        ->orderBy('time_consultation', 'desc')
        ->paginate(10);

        return view('modules.patient-record.index', compact('patient_record'));
    }

    public function viewConsult(WalkInAppointment $patient_rec)
    {

      $gender = ['Male', 'Female'];

      $checkup = ['Vaccination', 'Baby Check-up'];
      $consult = ['Consultation'];
 

      return view('modules.patient-record.view-consult', compact('patient_rec', 'checkup', 'consult', 'gender'));
    }

}

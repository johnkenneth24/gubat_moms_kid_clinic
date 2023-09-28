<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Models\WalkInPatient;

class PatientRecordController extends Controller
{
    public function index(Request $request)
    {

      $search = $request->input('search');

      $query = WalkInPatient::query()->orderBy('firstname', 'asc');

      if ($search) {
          $query->where('firstname', 'like', '%' . $search . '%')
              ->orWhere('middlename', 'like', '%' . $search . '%')
              ->orWhere('lastname', 'like', '%' . $search . '%');
      }

      $patient_record = $query->get();

        return view('modules.patient-record.index', compact('patient_record'));
    }

    public function viewConsult(WalkInPatient $patient_rec)
    {


      $gender = ['Male', 'Female'];

      $checkup = ['Vaccination', 'Baby Check-up'];
      $consult = ['Consultation'];

      $patient_appointment = WalkInAppointment::where('walk_in_patient_id', $patient_rec->id)->get();

      return view('modules.patient-record.view-consult', compact('patient_appointment','patient_rec', 'checkup', 'consult', 'gender'));
    }

}

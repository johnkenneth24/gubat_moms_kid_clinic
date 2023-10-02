<?php

namespace App\Http\Controllers;

use App\Models\BookAppointment;
use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Models\WalkInPatient;
use App\Models\User;

class PatientRecordController extends Controller
{
    public function index(Request $request)
    {

      $search = $request->input('search');

      $query_walkin = WalkInPatient::query()->orderBy('firstname', 'asc');

      if ($search) {
          $query_walkin->where('firstname', 'like', '%' . $search . '%')
              ->orWhere('middlename', 'like', '%' . $search . '%')
              ->orWhere('lastname', 'like', '%' . $search . '%');
      }

      $patient_walkin = $query_walkin->get();



      $query_patient = User::whereHas('roles', function ($query) {
          $query->where('name', 'patient');
      });

      if ($search) {
          $query_patient->where(function ($query) use ($search) {
              $query->where('firstname', 'like', '%' . $search . '%')
                  ->orWhere('middlename', 'like', '%' . $search . '%')
                  ->orWhere('lastname', 'like', '%' . $search . '%');
          });
      }

      $query_patient->orderBy('firstname', 'asc');
      $patient_online = $query_patient->get();



        return view('modules.patient-record.index', compact('patient_walkin' , 'patient_online'));
    }

    public function viewConsult(WalkInPatient $patient_rec)
    {


      $gender = ['Male', 'Female'];

      $checkup = ['Vaccination', 'Baby Check-up'];
      $consult = ['Consultation'];

      $patient_appointment = WalkInAppointment::where('walk_in_patient_id', $patient_rec->id)->where('status', 'Checked up')->get();

      return view('modules.patient-record.view-consult', compact('patient_appointment','patient_rec', 'checkup', 'consult', 'gender'));
    }

    public function viewConsultBookApp(User $patient_rec)
    {
      $gender = ['Male', 'Female'];

      $checkup = ['Vaccination', 'Baby Check-up'];
      $consult = ['Consultation'];

      $patient_appointment = BookAppointment::where('user_id', $patient_rec->id)->where('status', 'Checked up')->get();

      return view('modules.patient-record.view-consult', compact('patient_appointment','patient_rec', 'checkup', 'consult', 'gender'));
    }

}

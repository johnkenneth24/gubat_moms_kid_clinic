<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Models\WalkInConsultation;
use App\Models\WalkInPatient;
use App\Http\Requests\WalkInApp\StoreRequest;
use App\Http\Requests\WalkInApp\UpdateRequest;
use App\Http\Requests\WalkInConsult\StoreRequestConsult;
use App\Http\Requests\WalkInConsult\UpdateRequestConsult;


class WalkInAppController extends Controller
{
  public function create()
  {
    $patientName = WalkInPatient::all();

    $gender = ['Male', 'Female'];

    $checkup = ['Vaccination', 'Baby Check-up'];
    $consult = ['Consultation'];

    return view('modules.app-checkup.walkin-app.create', compact('patientName', 'checkup', 'consult', 'gender'));
  }

  public function store(Request $request)
  {
    $patientType = $request->input('patientType');

    if ($patientType == 'New Patient') {

      $validated = $request->validate([
        'firstname' => 'required',
        'middlename' => 'required',
        'lastname' => 'required',
        'mother_name' => 'required',
        'father_name' => 'required',
        'gender' => 'required',
        'birthdate' => 'required',
        'address' => 'required',
        'weight' => 'required',
        'height' => 'required',
        'age' => 'required',
        'type_consult' => 'required',
        'date_consultation' => 'required',
        'time_consultation' => 'required',
      ]);

      $walkIn = WalkInPatient::create([
        'firstname' => $validated['firstname'],
        'middlename' => $validated['middlename'],
        'lastname' => $validated['lastname'],
        'mother_name' => $validated['mother_name'],
        'father_name' => $validated['father_name'],
        'gender' => $validated['gender'],
        'birthdate' => $validated['birthdate'],
        'age' => $validated['age'],
        'address' => $validated['address'],
      ]);

      $walkInApp = $walkIn->walkInAppointment()->create([
        'type_consult' => $validated['type_consult'],
        'date_consultation' => $validated['date_consultation'],
        'time_consultation' => $validated['time_consultation'],
      ]);

      $walkInApp->walkInConsult()->create([
        'height' => $validated['height'],
        'weight' => $validated['weight'],
      ]);

      return redirect()->route('app-checkup.index')->with('success', $validated['firstname'] . ' ' . $validated['lastname'] . 'already added for appointment!');
    } else {

      $patientID = $request->input('patientName');

      $patientName = WalkInPatient::findOrFail($patientID);

      $fullname = $patientName->firstname . ' ' . $patientName->lastname;

      $validated = $request->validate([
        'weight' => 'required',
        'height' => 'required',
        'type_consult' => 'required',
        'date_consultation' => 'required',
        'time_consultation' => 'required',
      ]);

      $walkInApp = WalkInAppointment::create([
        'walk_in_patient_id' => $patientID,
        'type_consult' => $validated['type_consult'],
        'date_consultation' => $validated['date_consultation'],
        'time_consultation' => $validated['time_consultation'],
      ]);

      $walkInApp->walkInConsult()->create([
        'height' => $validated['height'],
        'weight' => $validated['weight'],
      ]);

      return redirect()->route('app-checkup.index')->with('success', $fullname . 'already added for appointment!');


    }
  }

  public function edit(WalkInAppointment $walkin)
  {
    $gender = ['Male', 'Female'];

    $checkup = ['Vaccination', 'Baby Check-up'];
    $consult = ['Consultation'];

    return view('modules.app-checkup.walkin-app.edit',  compact('checkup', 'consult', 'gender', 'walkin'));
  }

  public function update(UpdateRequest $request, WalkInAppointment $walkin)
  {
    $validated = $request->validated();

    $walkin->update([
      'firstname' => $validated['firstname'],
      'middlename' => $validated['middlename'],
      'lastname' => $validated['lastname'],
      'gender' => $validated['gender'],
      'birthdate' => $validated['birthdate'],
      'address' => $validated['address'],
      'height' => $validated['height'],
      'weight' => $validated['weight'],
      'age' => $validated['age'],
      'status' => $walkin->status,
      'type_consult' => $validated['type_consult'],
      'date_consultation' => $validated['date_consultation'],
      'time_consultation' => $validated['time_consultation'],
    ]);

    return redirect()->route('app-checkup.index')->with('success', $validated['firstname'] . ' ' . $validated['lastname'] . ' has been updated successfully!');
  }


  public function view(WalkInAppointment $walkin)
  {
    $gender = ['Male', 'Female'];

    $checkup = ['Vaccination', 'Baby Check-up'];
    $consult = ['Consultation'];

    return view('modules.app-checkup.walkin-app.view',  compact('checkup', 'consult', 'gender', 'walkin'));
  }

  public function consult(WalkInAppointment $walkin)
  {
    $gender = ['Male', 'Female'];

    $checkup = ['Vaccination', 'Baby Check-up'];
    $consult = ['Consultation'];

    return view('modules.app-checkup.walkin-consult.create', compact('checkup', 'consult', 'gender', 'walkin'));
  }

  public function consultStore(StoreRequestConsult $request, WalkInAppointment $walkin)
  {
    $validated = $request->validated();

    WalkInConsultation::create([
      'walk_in_appointment_id' => $walkin->id,
      'medication_intake' => $validated['medication_intake'],
      'medical_history' => $validated['medical_history'],
      'vaccine_received' => $validated['vaccine_received'],
      'diagnosis' => $validated['diagnosis'],
    ]);

    $walkin->update([
      'status' => "Checked Up",
    ]);

    return redirect()->route('patient-record.index')->with('success', $walkin->full_name . ' Check Up Done!');
  }
}

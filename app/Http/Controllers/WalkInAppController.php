<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Http\Requests\WalkInApp\StoreRequest;

class WalkInAppController extends Controller
{
    public function create()
    {
      $gender = ['Male', 'Female'];

      $checkup = ['Vaccination', 'Baby Check-up'];
      $consult = ['Consultation'];

      return view('modules.app-checkup.walkin-app.create', compact('checkup', 'consult', 'gender'));
    }

    public function store(StoreRequest $request)
    {
      $validated = $request->validated();

      WalkInAppointment::create([
        'firstname' => $validated['firstname'],
        'middlename' => $validated['middlename'],
        'lastname' => $validated['lastname'],
        'gender' => $validated['gender'],
        'birthdate' => $validated['birthdate'],
        'address' => $validated['address'],
        'height' => $validated['height'],
        'weight' => $validated['weight'],
        'age' => $validated['age'],
        'type_consult' => $validated['type_consult'],
        'date_consultation' => $validated['date_consultation'],
        'time_consultation' => $validated['time_consultation'],
      ]);

      return redirect()->route('app-checkup.index')->with('success', $validated['firstname'] . ' ' . $validated['lastname'] . 'already added for appointment!');
    }

}

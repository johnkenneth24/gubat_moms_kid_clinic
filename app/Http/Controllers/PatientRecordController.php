<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;

class PatientRecordController extends Controller
{
    public function index()
    {
        $patient_record = WalkInAppointment::with('walkInConsult')
        ->orderBy('date_consultation', 'desc')
        ->orderBy('time_consultation', 'desc')
        ->paginate(10);

        return view('modules.patient-record.index', compact('patient_record'));
    }

}

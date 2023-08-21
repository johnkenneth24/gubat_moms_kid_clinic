<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientRecordController extends Controller
{
    public function index()
    {
        return view('modules.patient-record.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;


class AppCheckupController extends Controller
{
    public function index()
    {
        $walkinapp = WalkInAppointment::orderBy('date_consultation', 'desc')->orderBy('time_consultation', 'desc')->paginate(10);

        return view('modules.app-checkup.index', compact('walkinapp'));
    }

    
}

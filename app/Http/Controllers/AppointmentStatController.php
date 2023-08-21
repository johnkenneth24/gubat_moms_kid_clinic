<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentStatController extends Controller
{
    public function index()
    {
        return view('modules.appointment-status.index');
    }
}

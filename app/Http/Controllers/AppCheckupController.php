<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppCheckupController extends Controller
{
    public function index()
    {
        return view('modules.app-checkup.index');
    }
}

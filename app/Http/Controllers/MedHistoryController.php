<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedHistoryController extends Controller
{
    public function index()
    {
        return view('modules.med-history.index');
    }
}

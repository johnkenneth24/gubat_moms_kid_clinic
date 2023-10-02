<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;

class MedHistoryController extends Controller
{
    public function index()
    {
      $book_apps = BookAppointment::where('user_id', auth()->user()->id)
      ->where('status', 'Checked up')
      ->orderBy('date_appointment' , 'desc')
      ->get();

        return view('modules.med-history.index', compact('book_apps'));
    }

    public function view(BookAppointment $book_app)
    {

      return view('modules.med-history.view', compact('book_app'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;


class AppCheckupController extends Controller
{
    public function index()
    {
      $now = now();

      $walkinapp = WalkInAppointment::where(function($query) use ($now) {
          $query->where('date_consultation', '>', $now->toDateString())->where('status', 'pedning')
                ->orWhere(function($query) use ($now) {
                    $query->where('date_consultation', $now->toDateString())
                          ->where('time_consultation', '>', $now->toTimeString());
                });
      })
      ->orderBy('date_consultation', 'asc')
      ->orderBy('time_consultation', 'asc')
      ->paginate(10);


        return view('modules.app-checkup.index', compact('walkinapp'));
    }


}

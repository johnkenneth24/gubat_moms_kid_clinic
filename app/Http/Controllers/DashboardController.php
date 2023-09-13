<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;

class DashboardController extends Controller
{
    public function index()
    {
      $now = now(); // Get the current date and time

      $walkinapp = WalkInAppointment::where(function($query) use ($now) {
          $query->where('date_consultation', '>', $now->toDateString()) // Check for future dates
                ->orWhere(function($query) use ($now) {
                    $query->where('date_consultation', $now->toDateString())
                          ->where('time_consultation', '>', $now->toTimeString()); // Check for future times on the current date
                });
      })
      ->where('status', 'pending') // Filter by the "pending" status
      ->orderBy('date_consultation', 'asc') // Order by ascending date (upcoming first)
      ->orderBy('time_consultation', 'asc') // Order by ascending time (upcoming first)
      ->count();

        return view('modules.dashboard', compact('walkinapp'));
    }
}

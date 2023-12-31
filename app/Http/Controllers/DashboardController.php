<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalkInAppointment;
use App\Models\User;
use App\Models\WalkInPatient;
use App\Models\BookAppointment;

class DashboardController extends Controller
{
  public function index()
  {
    // Get the current date
    $dateNow = date('Y-m-d');
    $month = date('m');


    $appointment_today = BookAppointment::where('status', 'Approved')
      ->whereDate('date_appointment', '=', $dateNow) // Use '=' instead of '=='
      ->count();

    $app_user_today = BookAppointment::where('user_id', auth()->user()->id)
      ->where('status', 'Approved')
      ->whereDate('date_appointment', '=', $dateNow) // Use '=' instead of '=='
      ->count();

    // Count WalkInPatient records
    $walkInPatientsCount = WalkInPatient::whereMonth('created_at' , $month)->count();

    // Count User records with the role "patient"
    $patientUsersCount = User::whereHas('roles', function ($query) {
        $query->where('name', 'patient');
    })
    ->whereMonth('created_at', $month)
    ->count();

    // Combine the counts
    $totalPatientCount = $walkInPatientsCount + $patientUsersCount;

    $walkin_cons = WalkInAppointment::where('status', 'Checked Up')
    ->where('type_consult', 'Consultation')
    ->whereMonth('date_consultation', $month)
    ->count();
    $book_cons = BookAppointment::where('status', 'Checked Up')
    ->where('category', 'consultation')
    ->whereMonth('date_appointment', $month)
    ->count();

    $total_cons = $walkin_cons + $book_cons;

    $walkin_baby = WalkInAppointment::where('status', 'Checked Up')
    ->where('type_consult', 'baby check-up')
    ->whereMonth('date_consultation', $month)
    ->count();
    $book_baby = BookAppointment::where('status', 'Checked Up')
    ->where('category', 'Baby Check-up')
    ->whereMonth('date_appointment', $month)
    ->count();

    $total_baby = $walkin_baby + $book_baby;

    $walkin_vacs = WalkInAppointment::where('status', 'Checked Up')
    ->where('type_consult', 'vaccination')
    ->whereMonth('date_consultation', $month)
    ->count();
    $book_vacs = BookAppointment::where('status', 'Checked Up')
    ->where('category', 'Vaccination')
    ->whereMonth('date_appointment', $month)
    ->count();

    $total_vacs = $walkin_vacs + $book_vacs;

    $app_pending = BookAppointment::where('status', 'pending')->count();

    return view('modules.dashboard', compact('app_pending','total_vacs','total_baby','total_cons','appointment_today', 'app_user_today', 'totalPatientCount'));
  }
}

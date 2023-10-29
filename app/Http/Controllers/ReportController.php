<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppointment;
use DateTime;
use App\Models\WalkInAppointment;
use DB;

class ReportController extends Controller
{
  public function index(Request $request)
{
    $selectedMonthYear = $request->input('selected_month');
    $category = $request->input('category');

    $date = new DateTime($selectedMonthYear);

    $cons = ['Vaccination', 'Baby Check-up', 'Consultation'];

    $selectedMonth = $date->format('m');
    $selectedYear = $date->format('Y');

    $combinedAppointments = WalkInAppointment::
    select('walk_in_appointments.walk_in_patient_id as user', 'walk_in_appointments.date_consultation as date', 'walk_in_appointments.time_consultation as time')
        ->where('walk_in_appointments.type_consult', $category)
        ->whereMonth('walk_in_appointments.date_consultation', $selectedMonth)
        ->whereYear('walk_in_appointments.date_consultation', $selectedYear)
        ->join('walk_in_patients', 'walk_in_appointments.walk_in_patient_id', '=', 'walk_in_patients.id')
        ->select('walk_in_appointments.walk_in_patient_id as user', 'walk_in_appointments.date_consultation as date', 'walk_in_appointments.time_consultation as time', 'walk_in_patients.firstname', 'walk_in_patients.lastname')
        ->union(
        BookAppointment::
        select('book_appointments.user_id as user', 'book_appointments.date_appointment as date', 'book_appointments.time_appointment as time', 'users.firstname', 'users.lastname')
        ->where('book_appointments.category',  strtolower($category))
        ->whereMonth('book_appointments.date_appointment', $selectedMonth)
        ->whereYear('book_appointments.date_appointment', $selectedYear)
        ->join('users', 'book_appointments.user_id', '=', 'users.id')
        )

    ->get();

    return view('modules.report.index', compact('combinedAppointments', 'cons'));
}


}

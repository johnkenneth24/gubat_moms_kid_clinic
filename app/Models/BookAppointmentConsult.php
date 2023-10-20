<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAppointmentConsult extends Model
{
    use HasFactory;

    protected $fillable = [
      'book_appointment_id',
      'height',
      'weight',
      'blood_pressure',
      'medication_intake', 
      'vaccine_received',
      'diagnosis'
  ];

  public function bookAppointment()
  {
    return $this->belongsTo(BookAppointment::class);
  }
}

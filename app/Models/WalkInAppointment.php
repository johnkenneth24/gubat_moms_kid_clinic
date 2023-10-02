<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkInAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
      'walk_in_patient_id',
      'height',
      'weight',
      'type_consult',
      'date_consultation',
      'time_consultation',
      'status'
    ];

    protected $casts = [
      'date_consultation' => 'date'
    ];

    public function walkInPatient()
    {
      return $this->belongsTo(WalkInPatient::class);
    }

    public function walkInConsult()
    {
      return $this->hasOne(WalkInConsultation::class, 'walk_in_appointment_id');
    }


}

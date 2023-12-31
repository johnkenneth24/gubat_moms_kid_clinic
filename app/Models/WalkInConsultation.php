<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalkInConsultation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'walk_in_appointment_id',
        'height',
        'weight',
        'blood_pressure',
        'medication_intake', 
        'vaccine_received',
        'diagnosis'
    ];



    public function walkInAppointment()
    {
      return $this->belongsTo(WalkInAppointment::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkInAppointment extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    protected $cast = [
      'birthdate' => 'date',
      'date_consultation' => 'date'
    ];

    public function walkInConsult()
    {
      return $this->hasMany(WalkInConsultation::class);
    }
}

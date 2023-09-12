<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkInAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
      'firstname',
      'middlename',
      'lastname',
      'gender',
      'birthdate',
      'address',
      'height',
      'weight',
      'age',
      'type_consult',
      'date_consultation',
      'time_consultation'
    ];

    protected $casts = [
      'birthdate' => 'date',
      'date_consultation' => 'date'
    ];

    public function walkInConsult()
    {
      return $this->hasMany(WalkInConsultation::class);
    }

    public function getFullNameAttribute()
    {
      $middleInitial = empty($this->middlename) ? '' : strtoupper(substr($this->middlename, 0, 1));

      return "{$this->firstname} {$middleInitial}. {$this->lastname}";
    }
}

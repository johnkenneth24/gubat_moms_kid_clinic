<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkInPatient extends Model
{
    use HasFactory;

    protected $fillable =
    [
      'firstname',
      'middlename',
      'lastname',
      'mother_name',
      'father_name',
      'gender',
      'birthdate',
      'address',
      'age',
    ];

    protected $casts = [
      'birthdate' => 'date',
    ];

    public function walkInAppointment()
    {
      return $this->hasMany(WalkInAppointment::class, 'walk_in_patient_id');
    }

    public function getFullNameAttribute()
    {
      $middleInitial = empty($this->middlename) ? '' : strtoupper(substr($this->middlename, 0, 1));

      return "{$this->firstname} {$middleInitial}. {$this->lastname}";
    }
}

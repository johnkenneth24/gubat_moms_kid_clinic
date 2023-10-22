<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'mother_name',
        'father_name',
        'suffix',
        'gender',
        'birthdate',
        'age',
        'contact_number',
        'address',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'date',
    ];


    public function boookAppointment()
    {
      return $this->hasMany(BookAppointment::class, 'user_id');
    }


    public function getFullNameAttribute()
    {

      $middleInitial = empty($this->middlename) ? '' : strtoupper(substr($this->middlename, 0, 1));

      return "{$this->firstname} {$middleInitial}. {$this->lastname} {$this->suffix}";
    }
}

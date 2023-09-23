<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'date_appointment',
        'time_appointment',
        'status'
    ];

    protected $casts = [
        'date_appointment' => 'date',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}

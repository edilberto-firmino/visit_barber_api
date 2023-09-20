<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barber',
        'id_opening_hours',
        'opening_time',
        'closing_time',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');
    }

    public function openingHours()
    {
        return $this->belongsTo(OpeningHours::class, 'id_opening_hours');
    }
}

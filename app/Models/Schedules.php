<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barber',
        'id_client',
        'id_type_cut',
        'id_opening_hours',
        'appointment_time',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function typeCut()
    {
        return $this->belongsTo(TypeCut::class, 'id_type_cut');
    }

    public function openingHour()
    {
        return $this->belongsTo(OpeningHour::class, 'id_opening_hours');
    }
}

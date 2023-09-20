<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barber',
        'id_client',
        'road',
        'number',
        'city',
        'reference_point',
        'zip_code',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}

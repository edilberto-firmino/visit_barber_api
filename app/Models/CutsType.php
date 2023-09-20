<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutsType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barber',
        'id_type_cut',
        'title_cuts',
        'value_cut',
        'time_cut',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');
    }
}

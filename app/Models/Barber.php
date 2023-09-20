<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    use HasFactory;

    protected $fillable = [
        'barber_id',
        'name_barber',
        'cpf_barber',
        'cnpj_barber',
        'number_cell_barber',
        'email_barber',
        'pass_barber',
    ];

    public function cutGallery()
    {
        return $this->belongsTo(CutGallery::class, 'barber_id');
    }
}

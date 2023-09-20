<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barber',
        'id_cut',
        'title_cuts',
        'path_image',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');
    }

    public function cut()
    {
        return $this->belongsTo(Cut::class, 'id_cut');
    }
}

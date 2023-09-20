<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barber',
        'id_user',
        'name_image',
        'path_image',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

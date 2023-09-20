<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'name_client',
        'email_client',
        'pass_client',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_client');
    }
}

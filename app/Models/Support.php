<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'name',
        'instansi',
        'phone',
        'keperluan',
        'keterangan',
        'kartu_identitas',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'name',
        'instansi',
        'phone',
        'tanggal_kunjungan',
        'keperluan',
        'keterangan',
        'kartu_identitas',
        'dokumen_pendukung',
        'status',
    ];
}

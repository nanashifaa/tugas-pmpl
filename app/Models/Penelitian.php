<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $table = 'penelitian';
    protected $primaryKey = 'id_penelitian';

    protected $fillable = [
        'id_user',
        'judul',
        'anggota',
        'tema',
        'tahun',
        'hibah',
        'luaran',
        'status',
    ];
}
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Fields yang bisa diisi massal
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    // Fields yang disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token'
    ];

    // Casting fields
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
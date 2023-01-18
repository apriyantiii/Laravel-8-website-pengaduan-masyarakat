<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $primaryKey ='id_pengguna';

    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'telp',
        'gender',
        'tgl_lahir',
        'domisili'
    ];

}

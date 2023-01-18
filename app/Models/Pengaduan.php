<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $primaryKey ='id_pengaduan';

    protected $fillable = [
        'tgl_pengaduan',
        'id_pengguna',
        'kode_pengaduan',
        'isi_laporan',
        'foto',
        'status',
    ];

    protected $dates=['tgl_pengaduan'];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }
}

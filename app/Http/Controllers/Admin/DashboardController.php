<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Pengguna;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all()->count();

        $pengguna= Pengguna::all()->count();

        $proses  = Pengaduan::where('status', 'proses')->get()->count();
        
        $selesai = Pengaduan::where('status', 'selesai')->get()->count();

        return view('Admin.Dashboard.index', ['petugas'=>$petugas, 'pengguna'=>$pengguna, 'proses'=>$proses, 'selesai'=>$selesai]);
    }
}

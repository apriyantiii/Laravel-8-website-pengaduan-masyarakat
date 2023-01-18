<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();

        return view('Admin.Pengguna.index', ['pengguna'=>$pengguna]);
    }

    public function show($id_pengguna)
    {
        $pengguna = Pengguna::where('id_pengguna', $id_pengguna)->first();

        return view('Admin.Pengguna.show', ['pengguna'=>$pengguna]);
    }

}

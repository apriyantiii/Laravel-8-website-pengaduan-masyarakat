<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function index()
    {
        // return $kode = Str::random(10);

        $pengaduan= Pengaduan::orderBy('tgl_pengaduan', 'desc')->get()->unique('kode_pengaduan');

        return view('Admin.Pengaduan.index', ['pengaduan'=>$pengaduan]);
    }

    // public function show($id_pengaduan)
    // {
    //     $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();

    //     $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();

    //     return view('Admin.Pengaduan.show', ['pengaduan'=>$pengaduan, 'tanggapan'=>$tanggapan]);
    // }

    public function show(Request $request)
    {
        $data['pengaduan'] = Pengaduan::where('kode_pengaduan', $request->kode_pengaduan)->orderBy('tgl_pengaduan', 'DESC')->get();
        
        return view('Admin.Pengaduan.show', $data);
    }

    public function submitTanggapan(Request $request)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
       
        $pengaduan->update(['status'=> $request->status]);

        $id_pengaduan       = $request->id_pengaduan;
        $tgl_tanggapan      = date('Y-m-d H:i:s');
        $tanggapan          = $request->tanggapan;
        $id_petugas         = Auth::guard('admin')->user()->id_petugas;

        Tanggapan::create([
            'id_pengaduan'  => $id_pengaduan,
            'tgl_tanggapan' => $tgl_tanggapan,
            'tanggapan'     => $tanggapan,
            'id_petugas'    => $id_petugas
        ]);

        return redirect()->back()->with(['status' => 'Berhasil']);
    }
}

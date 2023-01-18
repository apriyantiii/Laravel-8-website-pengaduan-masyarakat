<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Pengguna;
use App\Models\Petugas;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DB;

class UserController extends Controller
{
    public function index()
    {
        return view('User.index');
    }

    public function formLogin()
    {
        return view('User.masuk');
    }

    public function login(Request $request)
    {
        $username = Pengguna::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        if (Auth::guard('pengguna')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // return redirect()->back();
            return redirect()->route('aduin.index');
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }

    public function formRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required',
            'domisili' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = Pengguna::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }

        Pengguna::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'gender' => $data['gender'],
            'tgl_lahir' => $data['tgl_lahir'],
            'domisili' => $data['domisili'],
        ]);

        return redirect()->route('aduin.index');
    }

    public function logout()
    {
        Auth::guard('pengguna')->logout();

        // return redirect()->back();
        return redirect()->route('aduin.index');
    }

    public function formAduan()
    {
        return view('User.aduan');
    }

    public function storePengaduan(Request $request)
    {
        $kode = Str::random(5);
        
        if (!Auth::guard('pengguna')->user()) {
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

        $data = $request->all();

        $validate = Validator::make($data, [
            'isi_laporan' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        date_default_timezone_set('Asia/Bangkok');

        // if ($kode) {
            // $pengaduan = Pengaduan::create([
            //     'tgl_pengaduan' => date('Y-m-d h:i:s'),
            //     'id_pengguna' => Auth::guard('pengguna')->user()->id_pengguna,
            //     'isi_laporan' => $data['isi_laporan'],
            //     'foto' => $data['foto'] ?? '',
            // ]);
            // return redirect()->back();

        // }else{
            $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'id_pengguna' => Auth::guard('pengguna')->user()->id_pengguna,
            'kode_pengaduan' => $kode,
            'isi_laporan' => $data['isi_laporan'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);

        if ($pengaduan) {
            return redirect()->route('aduin.laporan', 'me')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function lihatAduan()
    {
        $pengguna_id = Auth::guard('pengguna')->user()->id_pengguna;
        $pengaduan = Pengaduan::where('id_pengguna', $pengguna_id)->orderBy('tgl_pengaduan', 'DESC')->get()->unique('kode_pengaduan');
        // $pengaduan= Pengaduan::orderBy('tgl_pengaduan', 'desc')->get()

        return view('User.daftar-aduan', ['pengaduan'=>$pengaduan]);
    }

    public function chat($kode_pengaduan)
    {
        $data = Pengaduan::where('kode_pengaduan', $kode_pengaduan)->get();

        $pengguna_id = Auth::guard('pengguna')->user()->id_pengguna;
        $pengguna = Pengguna::where('id_pengguna', $pengguna_id)->first();
        $pengaduan = Pengaduan::where('id_pengaduan', $pengguna_id)->get();
        // $data['pengaduan'] = Pengaduan::where('id_pengguna', $request->pengguna_id)->get();
        $data = [
            'pengguna' => $pengguna,
            // 'pengaduan' => $pengaduan,
            'pengaduan'     => $data,
            // 'tanggapan'     => $tanggapan
        ];
        return view('User.chat-aduan', $data);
    }

    public function balasChat(Request $request)
    {
        $tanggal_tanggapan = date('Y-m-d H:i:s');
        $pengguna_id = Auth::guard('pengguna')->user()->id_pengguna;

        $request->validate([
            'id_pengaduan'    => 'required',
            'tanggapan'       => 'required',

        ]);

        $object = [
            'id_pengguna'       => $pengguna_id,
            'tanggapan'       => $request->tanggapan,
            'tgl_tanggapan'     => $tanggal_tanggapan,
            'id_pengaduan'    => $request->id_pengaduan
        ];

        $data = Tanggapan::create($object);
        // return $data;
        return redirect()->back();

        // $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

        // $id_pengaduan       = $request->id_pengaduan;
        // $tgl_tanggapan      = date('Y-m-d H:i:s');
        // $tanggapan          = $request->tanggapan;
        // $id_petugas         = Auth::guard('admin')->user()->id_petugas;

        // Tanggapan::create([
        //     'id_pengaduan'  => $id_pengaduan,
        //     'tgl_tanggapan' => $tgl_tanggapan,
        //     'tanggapan'     => $tanggapan,
        //     'id_petugas'    => $id_petugas
        // ]);

        // return redirect()->back();
      
    }

    public function laporan($siapa = '')
    {
        $terverifikasi = Pengaduan::where([['id_pengguna', Auth::guard('pengguna')->user()->id_pengguna], ['status', '!=', '0']])->get()->count();
        $proses  = Pengaduan::where([['id_pengguna', Auth::guard('pengguna')->user()->id_pengguna], ['status', 'proses']])->get()->count();
        $selesai = Pengaduan::where([['id_pengguna', Auth::guard('pengguna')->user()->id_pengguna], ['status', 'selesai']])->get()->count();

        $hitung = [$terverifikasi, $proses, $selesai];

        if ($siapa == 'me') {
            $pengaduan = Pengaduan::where('id_pengguna', Auth::guard('pengguna')->user()->id_pengguna)->orderBy('tgl_pengaduan', 'desc')->get();

            return view('user.aduan', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa]);
        } else {
            $pengaduan = Pengaduan::where([['id_pengguna', '!=', Auth::guard('pengguna')->user()->id_pengguna], ['status', '!=', '0']])->orderBy('tgl_pengaduan', 'desc')->get();

            return view('user.aduan', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa]);
        }
    }

    public function edit()
    {
        $pengguna_id = Auth::guard('pengguna')->user()->id_pengguna;

        $pengguna = Pengguna::where('id_pengguna', $pengguna_id)->first();

        $data = [
            'pengguna' => $pengguna,
        ];

        return view('User.edit', $data);
    }

    public function update(Request $request, $id_pengguna)
    {
        $data               = Pengguna::findOrFail($id_pengguna);

        if ($request->password == "") {
            $data->update([
                'email'              => $request->email,
                'nama'               => $request->nama,
                'telepon'            => $request->telp,
                'domisili'           => $request->domisili,
                'username'           => $request->username,
                'gender'             => $request->gender,
            ]);
        } else {
            $data->update([
                'email'              => $request->email,
                'nama'               => $request->nama,
                'telepon'            => $request->telp,
                'domisili'           => $request->domisili,
                'username'           => $request->username,
                'gender'             => $request->gender,
                'password'           => Hash::make($request->password),
            ]);
        }
        return redirect()->back();
    }

    public function show()
    {
        // $pengguna_id = Auth::pengguna()->id;
        $pengguna_id = Auth::guard('pengguna')->user()->id_pengguna;
        // return $pengguna_id;

        $pengguna = Pengguna::where('id_pengguna', $pengguna_id)->first();
        // return $pengguna;

        $pengaduan = Pengaduan::where('id_pengguna', $pengguna_id)->get();

        $data = [
            'pengguna' => $pengguna,
            'pengaduan' => $pengaduan
        ];

        return view('User.profile', $data);
    }
}

@extends('layouts.html')

@section('title', 'Aduin | Edit Profile')

@section('header')
<a href="" class="text-grey">/</a>
<a href="" class="text-grey">Form Edit Profile Pengguna</a>
@endsection

@section('content')
<br><br><br><br>
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                Form Edit Profile
            </div>
            <div class="card-body">
                <form action="{{ route('update') }}" method="POST">
                    @csrf
                    {{-- @method('PATCH') --}}
                    <div class="form-group">
                        <label for="nama">Nama Pengguna</label>
                        <input type="text" value="{{ $pengguna->nama }}" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ $pengguna->email }}" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" value="{{ $pengguna->username }}" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telp</label>
                        <input type="number" value="{{ $pengguna->telp }}" name="telp" id="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="input-group mt-3">
                            <select name="gender" id="gender" class="custom-select">
                                @if ($pengguna->gender =='laki')
                                <option selected value="laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                                @else
                                <option value="laki">Laki-laki</option>
                                <option selected value="perempuan">Perempuan</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" value="{{ $pengguna->tgl_lahir }}" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="domisili">Domisili</label>
                        <input type="text" value="{{ $pengguna->domisili }}" name="domisili" id="domisili" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
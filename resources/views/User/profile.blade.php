@extends('layouts.html')

@section('title', 'Aduin | Data Profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
<style>
    .chat-container {
        height: 400px;
        overflow-y: auto;
    }
</style>
@endsection

@section('content')
<br><br><br><br>
{{-- <button>
    <a href="{{ route('aduan.index') }}">Pengaduan</a>
</button> --}}
<div class="row">
    <div class="col-4">
        <div class="card">
            <h5 class="card-header text-primary" >
                Profil Pengguna
            </h5>
            <div class="card-body">
                <h4 class="card-title">Hallo, {{ Auth::guard('pengguna')->user()->nama }}</h4>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $pengguna->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ $pengguna->email }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ $pengguna->username }}</td>
                            </tr>
                            <tr>
                                <th>No. Telp</th>
                                <td>:</td>
                                <td>{{ $pengguna->telp }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>:</td>
                                <td>{{ $pengguna->gender }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td>{{ date('d-m-Y', strtotime( $pengguna->tgl_lahir)) }}</td>
                            </tr>
                            <tr>
                                <th>Domisili</th>
                                <td>:</td>
                                <td>{{ $pengguna->domisili }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-8">
        <div class="card">
            <h6 class="card-header text-primary">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Edit Profil</button>
                    </li>
                </ul>
            </h6>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="card-body">
                        <form action="{{ route('update', $pengguna->id_pengguna) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{ $pengguna->email }}">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="number" name="telp" class="form-control" id="telp" placeholder="telp" value="{{ $pengguna->telp }}">
                                            <label for="telp">Telepon</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="{{ $pengguna->nama }}">
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="domisili" class="form-control" id="domisili" placeholder="domisili" value="{{ $pengguna->domisili }}">
                                            <label for="domisili">Domisili</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="tgl_lahir" value="{{ $pengguna->tgl_lahir }}">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="username" class="form-control" id="username" placeholder="username" value="{{ $pengguna->username }}">
                                            <label for="username">Username</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" name="gender" id="gender" aria-label="Floating label select example" value="">
                                                @if ($pengguna->gender =='laki')
                                                <option selected value="laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                                @else
                                                <option value="laki">Laki-laki</option>
                                                <option selected value="perempuan">Perempuan</option>
                                                @endif
                                            </select>
                                            <label for="gender">Jenis Kelamin</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" href="{{ route('profile') }}" class="btn btn-primary float-end">Edit Profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
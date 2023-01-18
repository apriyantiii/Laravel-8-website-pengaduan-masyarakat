@extends('layouts.html')

@section('title', 'Aduin | Data Profile')

@section('content')

<br><br><br><br>
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Detail Data Pengguna
                    </div>
                </div>
                <div class="card-bod">
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
@endsection
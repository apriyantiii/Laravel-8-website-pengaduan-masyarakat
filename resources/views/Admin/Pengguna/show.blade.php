@extends('layouts.admin')

@section('title', 'Detail Pengguna')

@section('css')
<style>
    .text-primary:hover {
        text-decoration: underline;
    }

    .text-grey {
        color: #6c757d;
    }

    .text-grey:hover {
        color: #6c757d;
    }
</style>
@endsection

@section('header')
<a href="{{ route('pengguna.index') }}" class="text-primary">Data Masyarakat</a>
<a href="#" class="text-grey">/</a>
<a href="#" class="text-grey">Detail Pengguna</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-12">
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
                            <td>{{ $pengguna->tgl_lahir }}</td>
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
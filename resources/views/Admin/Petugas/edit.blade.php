@extends('layouts.admin')

@section('title', 'Form Edit Petugas')

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
<a href="{{ route('petugas.index') }}" class="text-primary">Data Petugas</a>
<a href="" class="text-grey">/</a>
<a href="" class="text-grey">Form Edit Petugas</a>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                Form Edit Petugas
            </div>
            <div class="card-body">
                <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row mb-3">
                        <label for="nama_petugas" class="col-sm-2 col-form-label">Nama Petugas</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $petugas->nama_petugas }}" name="nama_petugas" id="nama_petugas" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $petugas->username }}" name="username" id="username" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="telp" class="col-sm-2 col-form-label">No. Telp</label>
                        <div class="col-sm-10">
                            <input type="number" value="{{ $petugas->telp }}" name="telp" id="telp" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                        <div class="input-group col-sm-10">
                            <select name="level" id="level" class="custom-select">
                                @if ($petugas->level =='admin')
                                <option selected value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                @else
                                <option value="admin">Admin</option>
                                <option selected value="petugas">Petugas</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
                </form>
                <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2" style="width: 100%">HAPUS</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
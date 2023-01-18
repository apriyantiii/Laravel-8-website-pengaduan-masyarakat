@extends('layouts.nav')

@section('title', 'Aduin | Register')

@section('nav')

@section('content')

<div class="col-lg-18">
    <div class="row justify-content-center">
        <div class="grid" style="width: 50rem;"><br><br><br><br>
            <h1 class="text-center"><b>Daftar</b></h1><br>
            <form action="{{ route('aduin.register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                                <label for="username">Username</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-floating">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                                <label for="nama">Nama Lengkap</label>
                            </div>
                        </div>
                    </div>
                </div>
                
    
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email" placeholder="email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-floating">
                                <input type="number" name="telp" class="form-control" id="telp" placeholder="telp" required>
                                <label for="telp">Telepon</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-floating">
                                <select class="form-control custom-select" name="gender" id="gender" placeholder="gender">
                                    <option value="" >Jenis Kelamin</option> 
                                    <option value="laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-floating">
                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="tgl_lahir">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <div class="form-floating">
                                <input type="text" name="domisili" class="form-control" id="domisili" placeholder="domisili" required>
                                <label for="domisili">Domisili</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                @if (Session::has('pesan'))
                    <div class="alert alert-danger mt-2">
                        {{ Session::get('pesan') }}
                    </div>
                @endif
                <button class="w-100 btn btn-lg btn-primary mt-1 mb-2" type="submit">Daftar</button><br>
            </form>
            <small class="d-block mt-2 mb-2 text-center" >Udah Punya Akun? <a href="{{ route('aduin.formLogin') }}">Masuk</a> </small>
        </div>
    </div>
</div>
@endsection
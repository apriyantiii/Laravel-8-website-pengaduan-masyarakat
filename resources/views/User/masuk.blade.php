@extends('layouts.nav')

@section('title', 'Aduin | Masuk')

@section('nav')

@section('content')

<br><br><br><br>
<main class="form-signin w-100 m-auto">
<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin w-100 m-auto">
            <form action="{{ route('aduin.login') }}" method="POST">
                @csrf
                <h1 class="text-center"><b>Masuk</b></h1><br>
        
            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <label for="username">Username</label>
            </div>

            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
            </form>

            @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
            @endif

            <small class="d-block mt-3" >Belum Daftar? <a href="{{ route('aduin.formRegister') }}">Daftar Sekarang</a> </small>
        </main>
    </div>
</div>
@endsection
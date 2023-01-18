<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            /* background: #4441eb; */
            background-color: #0065F2;
        }

        .btn-purple {
            background: #4441eb;
            width: 100%;
            color: #fff;
        }
    </style>
    <title>Halaman Masuk Petugas</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h2 class="text-center text-white mb-0 mt-5"><img src="img/logo2.png" width="200" loading="lazy" alt=""></h2>
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="text-center mb-5">LOGIN PETUGAS</h2>
                        <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            {{-- <div class="form-group">
                                <input type="text" name="username" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-purple">MASUK</button> --}}
                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>

                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Masuk</button>
                        </form>
                    </div>
                </div>
                @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @endif
                <a href="{{ route('aduin.index') }}" class="btn btn-success text-white mt-2" style="width: 100%">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>
</body>

</html>
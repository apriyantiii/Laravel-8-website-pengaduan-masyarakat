<nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: rgb(255, 255, 255)">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets') }}/img/logoterbaru.png" width="110" loading="lazy" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-5">
                <li class="nav-item">
                    <h5><a class="nav-link text-primary" href="{{ route('aduin.index') }}" style="padding-right: 20px">Beranda</a></h5>
                </li>
                @if (Auth::guard('pengguna')->check())
                {{-- <li class="nav-item">
                    <h5><a class="nav-link text-primary" href="{{ route('aduin.index') }}" style="padding-right: 20px">Alur</a></h5>
                </li> --}}
                @else
                <li class="nav-item">
                    <h5><a class="nav-link text-primary" href="#alurPengaduan" style="padding-right: 20px">Alur</a></h5>
                </li>
                @endif

                @if (Auth::guard('pengguna')->check())
                {{-- <li class="nav-item">
                    <h5><a class="nav-link text-primary" href="{{ route('aduin.index') }}" style="padding-right: 20px">Ketentuan</a></h5>
                </li> --}}
                @else
                <li class="nav-item">
                    <h5><a class="nav-link text-primary" href="#ketentuan" style="padding-right: 20px">Ketentuan</a></h5>
                </li>
                @endif

                @if (Auth::guard('pengguna')->check())
                <li class="nav-item">
                    <h5><a class="nav-link text-primary" href="{{ route('aduin.fromAduan') }}" style="padding-right: 20px">Pengaduan</a></h5>
                </li>
                @else
                <li class="nav-item">
                    <h5><a class="nav-link text-primary" href="#pengaduan" style="padding-right: 20px">Pengaduan</a></h5>
                </li>
                @endif

                @if (Auth::guard('pengguna')->check())
                <li class="nav-item">
                    <h5><a class="nav-link text-primary" href="{{ route('aduan.index') }}" style="padding-right: 20px">Tanggapan</a></h5>
                </li>
                @else
                    
                @endif
            </ul>

            <ul class="navbar-nav">
                @if(Auth::guard('pengguna')->check())
                <h5>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets') }}/img/avatar2.png" alt="avatar" style="width: 30px; height: 100%;">  Hi, {{ Auth::guard('pengguna')->user()->nama }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('aduin.logout') }}">Keluar</a></li>
                        </ul>
                    </li>
                </h5>
                @else

                {{-- navbar untuk login --}}
                <li class="nav-item nav-lg">
                    <h5><a class="nav-link text-light " style="background-color: #0065F2; border-radius: 50px; padding-left: 30px; padding-right: 30px" href="{{ route('aduin.formLogin') }}">Masuk</a></h5>
                </li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
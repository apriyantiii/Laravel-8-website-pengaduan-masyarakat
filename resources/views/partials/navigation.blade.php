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
                    <h5><a class="nav-link text-primary" href="{{ route('aduin.index') }}" style="padding-right: 25px">Beranda</a></h5>
                </li>
            </ul>

            <ul class="navbar-nav">
                {{-- navbar untuk login --}}
                <li class="nav-item nav-lg">
                    <h5><a class="nav-link text-light" style="background-color: #0065F2; border-radius: 50px; padding-left: 30px; padding-right: 30px" href="{{ route('aduin.formLogin') }}">Masuk</a></h5>
                </li>
            </ul>
        </div>
    </div>
</nav>
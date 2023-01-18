  <br><br><br><br>
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('assets') }}/img/Jumbotron1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets') }}/img/Jumbotron2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets') }}/img/Jumbotron3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-block">
          @if (Auth::guard('pengguna')->check())
          <a href="/aduan"><button class="w-15 btn btn-lg btn-primary" type="button" href="/aduan" style="background-color: #0065F2; border-radius: 50px; padding-right: 50px; padding-left: 50px; line-spacing: "><strong>Aduin Yukk!!</strong></button></a>
          <p></p>
          @else
          <a href="{{ route('aduin.formLogin') }}"><button class="w-15 btn btn-lg btn-primary" type="button" href="{{ route('aduin.formLogin') }}" style="background-color: #0065F2; border-radius: 50px; padding-right: 50px; padding-left: 50px; line-spacing: "><strong>Aduin Yukk!!</strong></button></a>
          <p></p>
          @endif
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  @yield('jumbutron')
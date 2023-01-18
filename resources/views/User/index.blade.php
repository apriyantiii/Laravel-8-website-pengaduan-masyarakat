{{-- Menggunakan layout utama--}}
@extends('layouts.main')

@section('title', 'Aduin Yuk!')

{{-- Apapun yg ada dalam section akan menggantikan yield yg dipanggil di main --}}
@section('content')
<style>
    body {
        background: #F4F9FF;
    }
</style>

<br id="alurPengaduan"><br><br><br>

{{-- ALUR UNTUK MELAKUKAN PENGADUAN --}}
<div>
    <div class="grid" style=" background-color: #F4F9FF; ">
        <div class="card-header text-center ">
            <h2><b>Alur ketika melakukan pengaduan :</b></h2>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="background-color: #D9ECFF; width: 300px; height: 350px">
                <br>
                <img src="{{ asset('assets') }}/img/Icon.png" class="card-img-top mx-auto d-block" style="width: 150px" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center" style="">Kunjungi website ini apabila anda merasa ada pelanggaran yang sedang terjadi atau sedang mengalami kendala. </h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="background-color: #D9ECFF; width: 300px; height: 350px">
                <br>
                <img src="{{ asset('assets') }}/img/Icon3.png" class="card-img-top mx-auto d-block" style="width: 140px" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center" style="">Isilah form pengaduan yang sudah disediakan kemudian kirimkan aduan tersebut agar dapat bisa ditanggapi oleh admin.</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="background-color: #D9ECFF; width: 300px; height: 350px">
                <br>
                <img src="{{ asset('assets') }}/img/Icon4.png" class="card-img-top mx-auto d-block" style="width: 140px" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center" style="">Tanyakan kembali apabila aduan yang kamu kirim masih belum jelas atau sampaikan keluhanmu yang lain.</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="background-color: #D9ECFF; width: 300px; height: 350px">
                <br>
                <img src="{{ asset('assets') }}/img/Icon5.png" class="card-img-top mx-auto d-block" style="width: 140px" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center" style="">Selesaikan aduan yang kamu ajukan ketika sudah mendapat balasan yang sesuai dengan yang kamu inginkan.</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<br id="ketentuan"><br><br><br>


{{-- KETENTUAN PENGADUAN --}}
<div class="row">
    <div class="card w-100" style="background-color: #D9ECFF; height: 550px; padding-bottom">
        <br><br>
        <h2 class="card-title text-center" style=""><b>Ketentuan dalam melakukan pengaduan:</b></h2>
        <div class="container">
            <div class="row">

                <div class="col-8">
                    <br><br>
                    <img src="{{ asset('assets') }}/img/Alur1.png" width="80rem;" style="margin-left: 85px; width: 30rem;" alt=""><br>
                    <br><img src="{{ asset('assets') }}/img/Alur2.png" width="80rem;" style="margin-left: 85px; width: 30rem;" alt=""><br>
                    <br><img src="{{ asset('assets') }}/img/Alur3.png" width="80rem;" style="margin-left: 85px; width: 30rem;" alt="">
                </div>
                {{-- <div class="col-8">
                    <br><br><br><br>
                    <div class="card col-6 mx-5">
                        <div class="card-body">
                            Sampaikan aduan Anda secara rinci dan jelas.
                        </div>
                    </div><br>

                    <div class="card col-6 mx-5">
                        <div class="card-body">
                            Jangan kirimkan pesan yang sama berulang kali.
                        </div>
                    </div><br>

                    <div class="card col-6 mx-5">
                        <div class="card-body">
                            Cek berkala ajuan Anda untuk melihat verifikasi pengaduan.
                        </div>
                    </div>
                </div> --}}

                <div class="col-2">
                    <div class="grid mt-0 mx-2" style="background-color: #D9ECFF; width: 400px; height: 400px">
                        <br>
                        <img src="{{ asset('assets') }}/img/Icon1.png" class="card-img-top mx-auto d-block" style ="" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</div><br id="pengaduan"><br><br><br>


{{-- MEKANISME PENGADUAN --}}
<div class="grid" style=" background-color: #F4F9FF; ">
    <div class="card-header text-center ">
        <h2><b>Pengaduan</b></h2>
    </div>
</div>

<div class="container col-8">
    <div class="grid" style="background-color: #F4F9FF;">
        <br>
        <div class="card-body">
            <h5 class="card-title text-center" style="">mekanisme penyampaian pengaduan dilakukan secara tertutup agar Anda dapat menanyakan lebih lanjut terkait aduan yang anda kirim. Sampaikan aduan Anda agar kami dapat meninjau ulang pelanggaran yang sedang terjadi atau menangani masalah yang sedang Anda alami.</h5>
        </div>
    </div>
</div><br><br>

<div class="d-grid gap-2 col-3 mx-auto">
    @if (Auth::guard('pengguna')->check())
    <a class="btn text-light" href="/pengaduan" role="button" style="background-color: #0065F2; border-radius: 50px;">Buat aduanmu yuk!! <b>></b></a>
    @else
    <a class="btn text-light" href="{{ route('aduin.formLogin') }}" role="button" style="background-color: #0065F2; border-radius: 50px;">Buat aduanmu yuk!! <b>></b></a>
    @endif
</div><br><br>

@endsection
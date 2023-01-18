@extends('layouts.html')

@section('title', 'Aduin | Pengaduan')

@section('content')
<br><br><br><br><br>

<div class="card-header text-center " style="position: absolute;
left: 20.56%;
right: 20.56%;
top: 16.38%;
bottom: 80.46%;
font-family: 'Poppins';
font-style: normal;
font-weight: 600;
font-size: 50px;
line-height: 41px;
text-align: center;
color: #000000;
">
<h7 class="d-block mt-3 text-center">Layanan Pengaduan Masyarakat </h7>
</div><br><br><br>

<div class="card-header text-center ">
  <br><h5>Silakan sampaikan aduan Anda.</h5>
</div><br>

<div class="row justify-content-center">
  <div class="grid" style="width: 50rem;">
    <div class="col-lg mt-3 mb-4">
      {{-- <div class="card">
                <div class="card-header bg-danger text-light">
                Yuk Aduin Disini!!
                </div>
            </div> --}}
      {{-- <form>
                <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kejadian</label>
                <input type="date" class="form-control" id="tanggal" aria-describedby="tanggal" >
                </div>
                <div class="mb-3">
                  <label for="laporan" class="form-label">Isi Laporan</label>
                  <textarea type="text" class="form-control" id="laporan" placeholder="Ceritain Detail Laporannya Yaa"></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Lampiran</label>
                    <input class="form-control" type="file" id="formFile" placeholder="Masukkan Foto Terkait Kejadian">
                  </div>
                
                <div class="d-grid gap-2">
                  <button type="button" class="btn btn-primary btn-lg">Aduin</button>
                </div>
              </form> --}}

      <div class="">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif
        @if (Session::has('pengaduan'))
        <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
        @endif
        <form action="{{ route('aduin.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-2">
            <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control" rows="4">{{ old('isi_laporan') }}</textarea>
          </div>

          <div class="mb-3">
            <input type="file" name="foto" class="form-control">
          </div>

          {{-- <div class="mb-3">
                      <input type="text" name="kode_pengaduan" placeholder="Masukkan Kategori Aduan" class="form-control">
                  </div> --}}

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
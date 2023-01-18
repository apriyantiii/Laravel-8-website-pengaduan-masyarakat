@extends('layouts.html')

@section('title', 'Aduin | Tanggapan')

@section('css')
    <style>
        .chat-container {
        height: 400px;
        overflow-y: auto;
    }
    </style>
@endsection

@section('content')

<br><br>
<div class="container py-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border-radius: 15px;">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                        <a href="{{ route('profile') }}"><i class="bi bi-chevron-left"></i></a>
                        <p class="mb-0 fw-bold">Live chat</p>
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row chat-container">
                        <div class="col-md-6 col-lg-5 col-xl-2 mb-4 mb-md-0 align-content-center"></div>
                        <div class="col-md-6 col-lg-7 col-xl-8">
                            <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" style="position: relative; height: 600px">
                                @foreach ($pengaduan as $item)
                                <div class="d-flex flex-row justify-content-start">
                                    <img src="{{ asset('assets') }}/img/avatar2.png" alt="avatar" style="width: 35px; height: 100%;">
                                    <div style="margin-left: 20px">
                                        <p class="small p-2 me-3 mb-1 rounded-3" style="background-color: #f5f6f7;">{{ $item->isi_laporan }}</p>
                                        <p><img src="{{ Storage::url($item->foto) }}" alt="Foto Pengaduan" style="width: 50%; height: 50%" class="embed-responsive"></p>
                                        <p class="small ms-3 mb-3 rounded-3 text-muted float-end">{{ $item->tgl_pengaduan->format('d M, h:i') }}</p>
                                    </div>
                                </div>

                                @forelse ($item->tanggapan as $item2)
                                @if($item2->id_pengguna)
                                <div class="d-flex flex-row justify-content-start">
                                    <img src="{{ asset('assets') }}/img/avatar2.png" alt="avatar" style="width: 35px; height: 100%;">
                                    <div style="margin-left: 20px">
                                        <p class="small p-2 me-3 mb-1 rounded-3"  style="background-color: #f5f6f7;">{{ $item2->tanggapan }}</p>
                                        <p class="small me-3 mb-3 rounded-3 text-muted float-end">{{ $item2->tgl_tanggapan->format('d M, h:i') }}</p>
                                    </div>
                                </div>
                                @endif
                                @if($item2->id_petugas)
                                <div class="d-flex flex-row justify-content-end">
                                    <div>
                                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">{{ $item2->tanggapan }}</p>
                                        <p class="small me-3 mb-3 rounded-3 text-muted">{{ $item2->tgl_tanggapan->format('d M, h:i') }}</p>
                                    </div >
                                    <img src="{{ asset('assets') }}/img/avatar2.png" alt="avatar" style="width: 35px; height: 100%;">
                                </div>
                                @endif

                                @empty

                                @endforelse
                                @endforeach
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 col-xl-8" style="margin-left: 200px;">
                        <form action="{{ route('balas.chat') }}" method="POST">
                        @csrf
                        <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                            <input type="text" name="id_pengaduan" value="{{ $pengaduan[0]->id_pengaduan }}" hidden></input>
                            <input name="tanggapan" type="text" class="form-control form-control-lg" id="exampleFormControlInput2" placeholder="Type message" style="background-color: #F4F9FF; margin-left: 20px;">
                            <button type="submit" class="ms-3 bg-primary text-white" style="border-color: #0065F2; border-radius: 27px; padding: 6px; ">Kirim</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(".chat-container").animate({
            scrollTop: $(".chat-container")[0].scrollHeight
        }, 'slow');
    </script>
@endsection
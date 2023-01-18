@extends('layouts.admin')

@section('title', 'Detail Pengaduan')

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

    .btn-purple-p {
        background: #4441eb;
        border: 1px solid #4441eb;
        color: #fff;
        width: 100%;
    }

    .bg-custom-green {
        background-color: rgb(100, 135, 241);
        color: white;
    }

    .chat-container {
        height: 400px;
        overflow-y: auto;
    }
</style>
@endsection

@section('header')
<a href="{{ route('pengaduan.index') }}" class="text-primary">Data Pengaduan</a>
<a href="#" class="text-grey">/</a>
<a href="#" class="text-grey">Detail Pengaduan</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="row chat-container">
            @foreach($pengaduan as $item)
                <div class="col-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <small>{{ $item->tgl_pengaduan }}</small><br>
                            {{ $item->isi_laporan }}
                        </div>
                    </div>
                </div>
                <div class="col-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ Storage::url($item->foto) }}" alt="Foto Pengaduan" style="width: 50%; height: 50%" class="embed-responsive">
                        </div>
                    </div>
                </div>
                
                @foreach ($item->tanggapan as $item2)

                @if ($item2->id_pengguna)
                <div class="col-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <small>{{ $item2->tgl_tanggapan }}</small><br>
                            {{ $item2->tanggapan }}
                        </div>
                    </div>
                </div>
                @endif

                @if ($item2->id_petugas)
                <div class="col-8 mt-3 ml-auto">
                    <div class="card bg-custom-green mt-2">
                        <div class="card-body">
                            <small>{{ $item2->tgl_tanggapan }}</small><br>
                            {{ $item2->tanggapan }}
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="col-12">
        <form action="{{ route('pengaduan.submit-tanggapan') }}" method="post">
            @csrf
            <input type="hidden" name="id_pengaduan" value="{{ $pengaduan[$pengaduan->count() - 1]->id_pengaduan }}">
            <div class="form-group">
                <label for="status">Status</label>
                <div class="input-group mb-3">
                    <select name="status" id="status" class="custom-select">
                        @if ($pengaduan->status = '0')
                        <option selected value="0">Pending</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        @elseif($pengaduan->status='proses')
                        <option value="0">Pending</option>
                        <option selected value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        @else
                        <option value="0">Pending</option>
                        <option value="proses">Proses</option>
                        <option selected value="selesai">Selesai</option>
                        @endif
                    </select>
                </div>
                <label for="">Balasan</label>
                <textarea name="tanggapan" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>

        @if (Session::has('status'))
        <div class="alert alert-success mt-2">
            {{ Session::get('status') }}
        </div>
        @endif
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
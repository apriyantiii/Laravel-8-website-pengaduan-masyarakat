@extends('layouts.html')

@section('title', 'Aduin | Tanggapan')

@section('content')

<br><br><br><br>
<div class="card">
    <h5 class="card-header text-primary">Daftar Pengaduan</h5>
    <div class="card-body">
        <table class="table">
        @if (Auth::guard('pengguna')->check())
        <table id='pengaduanTable' class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Waktu</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduan as $k => $v )
                <tr>
                    <td>{{ $v->pengguna->nama }}</td>
                    <td>
                        {{ $v->tgl_pengaduan->format('d-M-Y') }}<br>
                        <small>{{ $v->tgl_pengaduan->diffForHumans() }}</small>
                    </td>
                    <td>{{ $v->isi_laporan }}</td>
                    <td>
                        @if ($v->status =='0')
                        <a  class=" ">Pending</a>
                        @elseif($v->status == 'proses')
                        <a  class=" ">Proses</a>
                        @else
                        <a  class=" ">Selesai</a>
                        @endif
                    </td>
                    <td><a href="{{ route('pengaduan.chat', $v->kode_pengaduan) }}" style="text-decoration: underline">Lihat</a></td>
                </tr>
                @endforeach

            </tbody>
        </table> 
        @endif
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pengaduanTable').DataTable();
    });
</script>
@endsection
@extends('layouts.admin')

@section('title', 'Halaman Pengguna')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengguna')

@section('content')
<table id="penggunaTable" class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengguna as $k=>$v)
        <tr>
            <td>{{ $k += 1 }}</td>
            <td>{{ $v->nama }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->username }}</td>
            <td>{{ $v->telp }}</td>
            <td><a href="{{ route('pengguna.show', $v->id_pengguna) }}" style="text-decoration: underline">Lihat</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#penggunaTable').DataTable();
    });
</script>
@endsection
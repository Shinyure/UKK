@extends('layouts.tabelbuku')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<h1 class="h3 mb-2 text-gray-800">Absen Bulan: {{ $pembukuan->bulan }}</h1>

<div class="card">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>kamis</th>
                    <th>jumat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensi as $item)
                <tr>
                    <td>{{ $item->karyawan->nip }}</td>
                    <td>{{ $item->karyawan->nama}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

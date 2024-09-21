@extends('layouts.app')

@section('content')
<h1>Pembukuan Bulan {{ $bulan }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Senin</th>
            <th>Selasa</th>
            <th>Rabu</th>
            <th>Kamis</th>
            <th>Jumat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($absensi as $item)
        <tr>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->senin }}</td>
            <td>{{ $item->selasa }}</td>
            <td>{{ $item->rabu }}</td>
            <td>{{ $item->kamis }}</td>
            <td>{{ $item->jumat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

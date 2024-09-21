@extends('layouts.app')

@section('content')
    <h1>Absensi Bulan Januari</h1>
    <ul>
        @foreach($dataAbsensi as $absen)
            <li>{{ $absen->nama }} - {{ $absen->tanggal }}</li>
        @endforeach
    </ul>
@endsection

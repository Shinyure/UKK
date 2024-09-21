@extends('layouts.tabelabsen')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="#" class="btn btn-primary float-right">CV Excl</a>
                        
    <h1>JANUARI {{ \Carbon\Carbon::now()->startOfWeek()->format('F d') }} - 
    {{ \Carbon\Carbon::now()->endOfWeek()->subDay(2)->format('d') }}</h1>
    
    <div class="table-responsive">
        <table id="absensiTable" class="table table-bordered">
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
                @foreach($karyawan as $item)
                <tr>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
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

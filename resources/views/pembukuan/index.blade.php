@extends('layouts.tabelbuku')

@section('content')

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<h1 class="h3 mb-2 text-gray-800">Pembukuan Absen</h1>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($pembukuan) && count($pembukuan) > 0)
            @foreach($pembukuan as $item)
            <tr>
                <td>{{ $item->bulan }}</td>
                <td>
                    <a href="{{ route('pembukuan.show', $item->id) }}" class="btn btn-primary">Show</a>
                </td>
            </tr>
            @endforeach
            @else
                <p>Data pembukuan tidak tersedia.</p>
            @endif

        </tbody>
    </table>
</div>

@endsection

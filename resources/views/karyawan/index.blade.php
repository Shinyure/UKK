@extends('layouts/app')
@section('content')

@if(session('success'))
<p class="alert alert-success">{{session('success')}}</p>
@endif

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Data Karyawan</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Karyawan/Karyawati</h6>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach($karyawan as $karyawan)
                                <div class="col-md-3 mb-3">
                                    <div class="card profile-card shadow">
                                        <div class="card-body text-center">
                                            <!--Tombol Edit Kanan Atas-->
                                            <a href="{{ url('karyawan/'.$karyawan->nip.'/edit')}}" class="btn btn-outline-secondary btn-sm" style="position: absolute; top: 10px; right: 10px;">Edit</a>
 
                                            <!--Foto Profile-->
                                            @if ($karyawan->foto)
                                                <img class="rounded-circle mb-3" src="{{ url('foto').'/'.$karyawan->foto }}" style="width: 150px; height: 150px;" alt="Foto Karyawan">
                                            @else
                                                <img class="rounded-circle mb-3" src="{{ url('default.jpeg') }}" style="width: 150px; height: 150px;" alt="Foto Default">
                                            @endif

                                            <!--Data Karyawan-->
                                            <h5 class="card-title">{{ $karyawan->nama }}</h5>
                                            <p class="text-muted">{{ $karyawan->nip}}</p>
                                            <p class="text-muted">{{ $karyawan->devisi}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <!-- Tombol Add Model Kartu -->
                                <div class="col-md-3 mb-3">
                                    <div class="card profile-card shadow text-center">
                                        <div class="card-body text-center">
                                             <!-- Foto Profil sebagai Tombol Tambah Karyawan -->
                                                <a href="{{route('karyawan.create')}}">
                                                    <img class="rounded-circle mb-3" src="{{ url('plus.jpg') }}" style="width: 150px; height: 150px;" alt="Foto Default">
                                                </a>
                                             <h5 class="card-title">Tambah Karyawan</h5>
                                             <p class="text-muted">NIP: -</p>
                                            <p class="text-muted">Devisi: -</p>
                                        </div>
                                     </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    
                </div>

                
                
            </div>
        </div>
    </div>
    @endsection
</body>
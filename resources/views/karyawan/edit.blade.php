@extends('layouts.app')
@section('content')
@if($errors->any())

@foreach($errors->all() as $err)
<p class="alert alert-danger">{{$err}}</p>
@endforeach
@endif

<form action="{{ url('karyawan/'.$data->nip) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Edit Data</h6>
                </div>
                <div class="card-body text-center">
                    {{-- Foto paling atas dan berbentuk lingkaran --}}
                    @if($data->foto)
                    <div class="form-group">
                        <div style="position: relative; display: inline-block;">
                            <img id="profileImage" style="width: 250px; height: 250px; border-radius: 50%; object-fit: cover; cursor: pointer;" src="{{ url('foto').'/'.$data->foto }}">
                            
                            {{-- Overlay untuk mengganti foto --}}
                            <div id="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); color: white; display: none; align-items: center; justify-content: center; border-radius: 50%;">
                                <span>Change Photo</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Upload file di dalam foto --}}
                    <input type="file" id="foto" name="foto" style="display: none;" accept="image/*">
                    
                    {{-- Data Nama, NIP, dan Divisi --}}
                    <div class="form-group" style="width: 300px; margin: 0 auto;">
                        <label>Nama</label>
                        <input type="text" class="form-control text-center" name="nama" value="{{$data->nama}}">
                    </div>

                    <div class="form-group" style="width: 300px; margin: 0 auto;">
                        <label>NIP</label>
                        <input type="number" class="form-control text-center" name="nip" value="{{$data->nip}}" readonly>
                    </div>

                    <div class="form-group" style="width: 300px; margin: 0 auto;">
                        <label>Devisi</label>
                        <input type="text" class="form-control text-center" name="devisi" value="{{$data->devisi}}">
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Saves</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ url('karyawan/'.$data->nip) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</button>
</form>

{{-- Script untuk menampilkan overlay dan fungsi upload file saat foto diklik --}}
<script>
    const profileImage = document.getElementById('profileImage');
    const overlay = document.getElementById('overlay');
    const fileInput = document.getElementById('foto');

    profileImage.addEventListener('mouseover', () => {
        overlay.style.display = 'flex'; // Tampilkan overlay saat hover
    });

    profileImage.addEventListener('mouseout', () => {
        overlay.style.display = 'none'; // Sembunyikan overlay saat mouse keluar
    });

    profileImage.addEventListener('click', () => {
        fileInput.click(); // Trigger input file saat foto diklik
    });

    // Preview foto baru
    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result; // Ganti foto dengan foto baru yang dipilih
            }
            reader.readAsDataURL(file);
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nipField = document.querySelector('input[name="nip"]');
        const originalNip = nipField.value;

        nipField.addEventListener('input', function() {
            if (nipField.value !== originalNip) {
                alert('NIP tidak bisa diubah!');
                nipField.value = originalNip; // Kembalikan NIP ke nilai asli 
            }
        });
    });
</script>

@endsection

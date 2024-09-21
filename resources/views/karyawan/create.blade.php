@extends('layouts.app')
@section('content')
@if($errors->any())
@foreach($errors->all() as $err)
<p class="alert alert-danger">{{$err}}</p>
@endforeach
@endif
<form action="{{route('karyawan.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Tambah Data</h6>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="number" class="form-control" name="nip">
                    </div>
                             
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" >
                    </div>
                
                    <div class="form-group">
                        <label>Devisi</label>
                        <input type="text" class="form-control" name="devisi">
                    </div>

                    <div class="form-group">
                        <label for="foto">Upload Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
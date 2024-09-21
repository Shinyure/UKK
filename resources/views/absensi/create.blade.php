@extends('layouts.app')
@section('content')

<form action="{{route('absensi.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Tambah Data</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Devisi</label>
                        <input type="text" class="form-comtrol" name="devisi" value="{{old('devisi')}}">
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
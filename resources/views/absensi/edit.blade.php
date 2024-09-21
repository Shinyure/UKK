@extends('layouts.app')
@section('content')

<form action="{{url('absensi/'.$data->kodeabsensi)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Edit Data</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Devisi</label>
                        <input type="text" class="form-comtrol" name="devisi" value="{{$data->devisi}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
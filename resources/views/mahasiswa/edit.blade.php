@extends('admin.layout')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title fw-bolder mb-3">Edit Unit</h5>
            <form method="post" action="{{ route('mahasiswa.update', $data->NIM) }}">
                @csrf

                <div class="mb-3">
                    <label for="hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="hp" name="hp"
                           value="{{ $data->No_HP }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                           value="{{ $data->nama}}" >
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->Alamat }}">
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $data->Jurusan }}">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>

            </form>
        </div>
    </div>
@stop

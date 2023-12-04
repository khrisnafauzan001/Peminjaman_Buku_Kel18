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
            <form method="post" action="{{ route('admin.update', $data->id_buku) }}">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul"
                           value="{{ $data->Judul_Buku}}" >
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Buku</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah"
                           value="{{ $data->Jumlah_Buku }}">
                </div>

                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun terbit</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $data->Tahun_Terbit }}">
                </div>


                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>

            </form>
        </div>
    </div>
@stop

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

    @if(isset($error_D))
        <div class="alert alert-danger">
            {{ $error_D }}
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title fw-bolder mb-3">Tambah Buku</h5>
            <form method="post" action="{{route('admin.insert', $status)}}">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Buku</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah">
                </div>

                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun Terbit</label>
                    <input type="text" class="form-control" id="tahun" name="tahun">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>

            </form>
        </div>
    </div>
@stop

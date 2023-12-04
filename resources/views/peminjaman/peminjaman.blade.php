@extends('admin.layout')

@section('content')

    <h4 class="mt-5">Peminjaman</h4>

    @if($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="mt-2">
        <form method="get" action="{{ route('peminjaman.search', 'on') }}">
            <div class="input-group">
                <input type="text" class="form-control" id="key" name="key" placeholder="Enter keyword">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    



    <a href="{{ route('peminjaman.addPeminjaman', ['status' => 'on']) }}" type="button" class="btn btn-primary rounded-3">Add New Peminjaman</a>

    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>Kode Pinjam</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->Kode_Pinjam }}</td>
                <td>{{ $data->nama}}</td>
                <td>{{ $data->judul}}</td>
                <td>{{ $data->tanggal}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>



@stop

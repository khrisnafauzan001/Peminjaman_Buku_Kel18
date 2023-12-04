@extends('admin.layout')

@section('content')

    <h4 class="mt-5">HOME</h4>

    @if($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="mt-2">
        <form method="GET" action="{{ route('admin.search', 'on') }}">
            <div class="input-group">
                <input type="text" class="form-control" id="key" name="key" placeholder="Enter keyword">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    



    <a href="{{ route('admin.add', ['status' => 'on']) }}" type="button" class="btn btn-primary rounded-3">Add New Book</a>

    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>id_buku</th>
            <th>Judul Buku</th>
            <th>Jumlah Buku</th>
            <th>Tahun Terbit</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_buku }}</td>
                <td>{{ $data->Judul_Buku}}</td>
                <td>{{ $data->Jumlah_Buku}}</td>
                <td>{{ $data->Tahun_Terbit }}</td>

                <td>
                    <a href="{{ route('admin.edit', ['id' =>$data->id_buku] ) }}" type="button"
                       class="btn btn-info rounded-3">Edit</a>
                </td>
                
                <td>
                    <a href="{{ route('admin.softDelete', ['id' =>$data->id_buku] ) }}" type="button"
                       class="btn btn-warning rounded-3">Soft Delete</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>



@stop

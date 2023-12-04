@extends('admin.layout')

@section('content')

    <h4 class="mt-5">Mahasiswa</h4>

    @if($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="mt-2">
        <form method="get" action="{{ route('mahasiswa.search', 'on') }}">
            <div class="input-group">
                <input type="text" class="form-control" id="key" name="key" placeholder="Enter keyword">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    



    <a href="{{ route('mahasiswa.addMahasswa', ['status' => 'on']) }}" type="button" class="btn btn-primary rounded-3">Add New Mahasiswa</a>

    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->NIM }}</td>
                <td>{{ $data->nama}}</td>
                <td>{{ $data->No_HP}}</td>
                <td>{{ $data->Alamat}}</td>
                <td>{{ $data->Jurusan }}</td>

                <td>
                    <a href="{{ route('mahasiswa.edit', ['id' =>$data->NIM] ) }}" type="button"
                       class="btn btn-info rounded-3">Edit</a>
                </td>
                
                <td>
                    <a href="{{ route('mahasiswa.softDelete', ['id' =>$data->NIM] ) }}" type="button"
                       class="btn btn-warning rounded-3">Soft Delete</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>



@stop

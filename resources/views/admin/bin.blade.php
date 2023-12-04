@extends('admin.layout')

@section('content')

    <h4 class="mt-3">Recycle Bin</h4>

    @if($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif
    <h5 class="mt-3">Buku</h5>

    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>id_buku</th>
            <th>Judul Buku</th>
            <th>Jumnlah Buku</th>
            <th>Tahun Terbit</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_buku }}</td>
                <td>{{ $data->Judul_Buku }}</td>
                <td>{{ $data->Jumlah_Buku }}</td>
                <td>{{ $data->Tahun_Terbit }}</td>

                <td>
                    <a href="{{ route('admin.restore', ['id' =>$data->id_buku] ) }}" type="button"
                       class="btn btn-info rounded-3">Restore</a>
                </td>
                <td>
                    <a href="{{ route('admin.hardDelete', ['id' =>$data->id_buku] ) }}" type="button"
                       class="btn btn-info rounded-3">Hard Delete</a>
                </td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
    <h5 class="mt-3">Mahasiswa</h5>

<table class="table table-hover mt-2">
    <thead>
    <tr>
        <th>NIM</th>
        <th>No HP</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jurusan</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($datas1 as $data1)
        <tr>
            <td>{{ $data1->NIM }}</td>
            <td>{{ $data1->No_HP }}</td>
            <td>{{ $data1->nama}}</td>
            <td>{{ $data1->Alamat }}</td>
            <td>{{ $data1->Jurusan }}</td>

            <td>
                <a href="{{ route('mahasiswa.restore', ['id' =>$data1->NIM] ) }}" type="button"
                   class="btn btn-info rounded-3">Restore</a>
            </td>
            <td>
                <a href="{{ route('mahasiswa.hardDelete', ['id' =>$data1->NIM] ) }}" type="button"
                   class="btn btn-info rounded-3">Hard Delete</a>
            </td>
            
        </tr>
    @endforeach
    </tbody>
</table>
@stop

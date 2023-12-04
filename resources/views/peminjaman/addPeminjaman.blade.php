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
            <h5 class="card-title fw-bolder mb-3">Tambah Peminjaman</h5>
            <form method="post" action="{{route('peminjaman.insertPeminjaman', $status)}}">
                @csrf
                
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM Mahasiswa</label>
                    <select name="nim" id="nim" class="form-control">
                        <option value= ""></option>
                        @foreach ($datas1 as $data1)
                        <option value= "{{ $data1->NIM  }}">{{ $data1->NIM }} - {{$data1->nama}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_buku" class="form-label">ID Buku</label>
                    <select name="id_buku" id="id_buku" class="form-control">
                        <option value= ""></option>
                        @foreach ($datas as $data)
                        <option value= "{{ $data->id_buku  }}">{{ $data->id_buku }} - {{$data->Judul_Buku}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Kembali</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>

            </form>
        </div>
    </div>
@stop

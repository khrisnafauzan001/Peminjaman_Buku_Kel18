<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function viewHome(Request $request)
    {
        $datas = DB::select("
            SELECT *
            FROM buku WHERE  status = 'on';", []);
        $user = session('user');
        return view('admin.home', ['user' => $user])->with('datas', $datas);
    }

    



    public function viewAdd($status)
    {
        $user = session('user');
        return view('admin.add', ['user' => $user])->with('status', $status);
    }

    public function viewAddMahasiswa($status)
    {
        $user = session('user');
        return view('mahasiswa.addMahasiswa', ['user' => $user])->with('status', $status);
    }

    public function viewAddPeminjaman($status)
    {
        $user = session('user');
        $datas = DB::select('SELECT * FROM buku');
        $datas1 = DB::select('SELECT * FROM mahasiswa');
        return view('peminjaman.addPeminjaman', ['user' => $user])->with(['status' => $status, 'datas' => $datas, 'datas1' => $datas1  ]);
    }



    public function edit($id)
    {
        $user = session('user');
        $datas = DB::select('SELECT * FROM buku WHERE id_buku = :id', ['id'=>$id]);
        $data = $datas[0];
        return view('admin.edit', ['user' => $user])->with(['data' => $data]);
    }

    public function editMahasiswa($id)
    {
        $user = session('user');
        $datas = DB::select('SELECT * FROM mahasiswa WHERE NIM = :id', ['id'=>$id]);
        // dd($datas);
        $data = $datas[0];
        return view('mahasiswa.edit', ['user' => $user])->with(['data' => $data]);
    }





  

    public function viewBin()
    {
        $user = session('user');
        $datas = DB::select("
            SELECT *
            FROM buku WHERE status = :status;", [ 'status' => 'off']);
        $datas1 = DB::select("
            SELECT *
            FROM mahasiswa WHERE status = :status;", [ 'status' => 'off']);        
        return view('admin.bin',['user' => $user])->with(['datas'=>$datas, 'datas1'=>$datas1]);
    }

    public function viewMahasiswa()
    {
        $datas = DB::select("
            SELECT *
            FROM mahasiswa WHERE  status = 'on';", []);
        $user = session('user');
        return view('mahasiswa.mahasiswa', ['user' => $user])->with('datas', $datas);
    }

    public function viewPeminjaman()
    {
        $datas = DB::select("
        SELECT p.Kode_Pinjam as Kode_Pinjam, m.nama as nama, b.Judul_Buku as judul, p.Tanggal_Kembali as tanggal   
        FROM peminjaman p 
        LEFT JOIN buku b ON p.id_buku = b.id_buku
        LEFT JOIN mahasiswa m ON p.NIM = m.NIM;", []);
        $user = session('user');
        return view('peminjaman.peminjaman', ['user' => $user])->with('datas', $datas);
    }

}

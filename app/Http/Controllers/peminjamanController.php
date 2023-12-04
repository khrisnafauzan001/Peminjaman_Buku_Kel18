<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class peminjamanController extends Controller
{
    public function search(Request $request, $status)
    {
        $user = session('user');
        $kw = $request->input('key');
        $skw = '%'.(string)$kw.'%';
        $datas = DB::select(
            "        
            SELECT p.Kode_Pinjam as Kode_Pinjam, m.nama as nama, b.Judul_Buku as judul, p.Tanggal_Kembali as tanggal   
            FROM peminjaman p 
            LEFT JOIN buku b ON p.id_buku = b.id_buku
            LEFT JOIN mahasiswa m ON p.NIM = m.NIM
            WHERE m.nama LIKE :keyword ;",
            [
                'keyword' => $skw,
            ]
        );


        return view('peminjaman.peminjaman', ['user' => $user])->with('datas', $datas);
    }

    public function insertPeminjaman(Request $request, $status){
        $user = session('user');
        $request->validate([
            'nim' => 'required',
            'id_buku' => 'required',
            'tanggal' => 'required',
        ]);

        DB::insert(
            'INSERT INTO peminjaman(NIM,id_buku, Tanggal_Kembali)
                    VALUES (:nim, :id_buku, :tanggal);',
            [
                'nim' => $request->nim,
                'id_buku' => $request->id_buku,
                'tanggal' => $request->tanggal
            ]
        );

        
        return redirect()->route('admin.peminjaman')->with('success', 'Added new unit add to database is success');
    }
}

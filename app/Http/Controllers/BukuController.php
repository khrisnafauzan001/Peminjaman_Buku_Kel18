<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BukuController extends Controller
{
    public function insert(Request $request, $status){
        $user = session('user');
        $request->validate([
            'judul' => 'required',
            'jumlah' => 'required',
            'tahun' => 'required',
        ]);

        DB::insert(
            'INSERT INTO buku(Judul_Buku,Jumlah_Buku, Tahun_Terbit, status)
                    VALUES (:judul, :jumlah, :tahun, :status);',
            [
                'judul' => $request->judul,
                'jumlah' => $request->jumlah,
                'tahun' => $request->tahun,
                'status' => $status
            ]
        );

        
        return redirect()->route('admin.home')->with('success', 'Added new unit add to database is success');
    }

    public function update($id, Request $request)
    {
        $user = session('user');
        $request->validate([
            'judul' => 'required',
            'jumlah' => 'required',
            'tahun' => 'required',
        ]);

        DB::update(
            'UPDATE buku SET
                     Judul_Buku = :judul,
                     Jumlah_Buku = :jumlah,
                     Tahun_Terbit = :tahun
                 WHERE id_buku = :id',
            [
                'id' => $id,
                'judul' => $request->judul,
                'jumlah' => $request->jumlah,
                'tahun' => $request->tahun,
            ]
        );

        

        return redirect()->route('admin.home')->with('success', 'Data of unit changed is success');
    }

    public function search(Request $request, $status)
    {
        $user = session('user');
        $kw = $request->input('key');
        $skw = '%'.(string)$kw.'%';
        $datas = DB::select(
            "
            SELECT *
            FROM buku 
            WHERE status = 'on' AND Judul_Buku LIKE :keyword ;",
            [
                'keyword' => $skw,
            ]
        );


        return view('admin.home', ['user' => $user])->with('datas', $datas);
    }

    public function restore($id)
    {
        $user = session('user');
        DB::update(
            'UPDATE buku SET status = :status WHERE id_buku = :id',
            [
                'id' => $id,
                'status' => 'on'
            ]
        );
        // DB::delete('DELETE FROM ice_cream WHERE id_ic = :id_v', ['id_v' => $id]);
        return redirect()->route('admin.home')->with('success', 'Unit book has been RESTORE');
    }

    public function softDelete($id)
    {
        $user = session('user');
        DB::update(
            'UPDATE buku SET status = :status WHERE id_buku = :id',
            [
                'id' => $id,
                'status' => 'off'
            ]
        );
        return redirect()->route('admin.bin')->with('success', 'Unit book has been RESTORE');
    }

    public function hardDelete($id)
    {
        $user = session('user');
        DB::delete(
            'DELETE FROM buku WHERE id_buku = :id',
            [
                'id' => $id,
            ]
        );
        return redirect()->route('admin.bin')->with('success', 'Unit book has been RESTORE');
    }

    
}

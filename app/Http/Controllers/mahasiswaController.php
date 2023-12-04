<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class mahasiswaController extends Controller
{
    public function insert(Request $request, $status){
        $user = session('user');
        $request->validate([
            'hp' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
        ]);

        DB::insert(
            'INSERT INTO mahasiswa(No_HP,Alamat, Jurusan, status, nama)
                    VALUES (:hp, :alamat, :jurusan, :status, :nama);',
            [
                'hp' => $request->hp,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jurusan' => $request->jurusan,
                'status' => $status
            ]
        );

        
        return redirect()->route('admin.mahasiswa')->with('success', 'Added new unit add to database is success');
    }

    public function update($id, Request $request)
    {
        $user = session('user');
        $request->validate([
            'hp' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
        ]);

        DB::update(
            'UPDATE mahasiswa SET
                     No_HP = :hp,
                     Alamat = :alamat,
                     Jurusan = :jurusan,
                     nama = :nama
                 WHERE NIM = :id',
            [
                'id' => $id,
                'hp' => $request->hp,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jurusan' => $request->jurusan,
            ]
        );

        

        return redirect()->route('admin.mahasiswa')->with('success', 'Data of unit changed is success');
    }

    public function search(Request $request, $status)
    {
        $user = session('user');
        $kw = $request->input('key');
        $skw = '%'.(string)$kw.'%';
        $datas = DB::select(
            "
            SELECT *
            FROM mahasiswa
            WHERE status = 'on' AND nama LIKE :keyword ;",
            [
                'keyword' => $skw,
            ]
        );


        return view('mahasiswa.mahasiswa', ['user' => $user])->with('datas', $datas);
    }

    public function restore($id)
    {
        $user = session('user');
        DB::update(
            'UPDATE mahasiswa SET status = :status WHERE NIM = :id',
            [
                'id' => $id,
                'status' => 'on'
            ]
        );
        return redirect()->route('admin.mahasiswa')->with('success', 'Unit mahasiswa has been RESTORE');
    }

    public function softDelete($id)
    {
        $user = session('user');
        DB::update(
            'UPDATE mahasiswa SET status = :status WHERE NIM = :id',
            [
                'id' => $id,
                'status' => 'off'
            ]
        );
        return redirect()->route('admin.mahasiswa')->with('success', 'Unit mahasiswa has been RESTORE');
    }

    public function hardDelete($id)
    {
        $user = session('user');
        DB::delete(
            'DELETE FROM mahasiswa WHERE NIM = :id',
            [
                'id' => $id,
            ]
        );
        return redirect()->route('admin.bin')->with('success', 'Unit mahasiswa has been RESTORE');
    }
}

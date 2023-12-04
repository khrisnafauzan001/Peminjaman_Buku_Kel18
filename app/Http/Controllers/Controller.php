<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    public function viewLogin()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $data = DB::select( 'SELECT * FROM users WHERE username = :user',
            [

                'user'=>$request->username,
            ]);
        if($data == null){
//            dd('salah user');
            return view('login')->with(['fail'=> 'Username no exist']);
        }
        $data1 = $data[0];
        if($data1->password != $request->password){
            return view('login')->with(['fail'=> 'Wrong Password']);
        }

//        dd($intend);
        session(['user' => $data1]);

        return redirect()->intended('/adminHome');
    }
    public function logout(Request $request)
    {

        session()->forget('user');

        return redirect('/');
    }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Masyarakat;

class RegisterController extends Controller
{
    //
    public function index () {
        return view('registermas');
    }

    public function add (Request $request) {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required'
        ]);

        $masyarakat = new Masyarakat([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Crypt::encryptString($request->password),
            'telp' => $request->telp
        ]);
 
        if ($masyarakat->save()) {
            $request->session()->put('userlogin', $request->username);
            //return response()->json(['msg' => 'Masyarakat Berhasil ditambahkan'], 200);
            return redirect('/');
        }
    }
}

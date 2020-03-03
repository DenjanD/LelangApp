<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masyarakat;
use Illuminate\Support\Facades\Crypt;

class MasyarakatController extends Controller
{
    //
    public function read() {
        $masyarakat = Masyarakat::all();

        return response()->json($masyarakat, 200);
    }

    public function add(Request $request) {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'telp' => 'required'
        ]);

        $masyarakat = new Masyarakat([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'username' => $request->input('username'),
            'password' => Crypt::encryptString($request->input('password')),
            'telp' => $request->input('telp')
        ]);

        if ($masyarakat->save()) {
            //return response()->json(['msg' => 'Masyarakat Berhasil ditambahkan'], 200);
            return view('masyarakat/home');
        }
        return response()->json(['msg' => 'Gagal menambahkan masyarakat'], 404);
    }
}

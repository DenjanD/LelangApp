<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use Illuminate\Support\Facades\Crypt;

class PetugasController extends Controller
{
    //
    public function index() {
        $petugas = Petugas::all();

        return view('adminpetugas/petugas', ['list_petugas' => $petugas]);
    }

    public function read() {
        $petugas = Petugas::all();

        return response()->json($petugas, 200);
    }

    public function add(Request $request) {
        $this->validate($request, [
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_level' => 'required'
        ]);

        $petugas = new Petugas([
            'nama_petugas' => $request->input('nama_petugas'),
            'username' => $request->input('username'),
            'password' => Crypt::encryptString($request->input('password')),
            'id_level' => $request->input('id_level')
        ]);
    
        if ($petugas->save()) {
            return response()->json(['msg' => 'Data petugas berhasil disimpan'], 200);
        }
        return response()->json(['msg' => 'Terjadi kesalahan saat menambahkan data petugas'], 404);
    }

    public function update(Request $request) {
        $upPetugas = Petugas::where('id_petugas', $request->input('id_petugas'))->first();
        
        $upPetugas->nama_petugas = $request->input('nama_petugas');
        $upPetugas->username = $request->input('username');
        $upPetugas->password = $request->input('password');
        $upPetugas->id_level = $request->input('id_level');

        if ($upPetugas->update()) {
            return response()->json(['msg' => 'Petugas telah diupdate', 'data' => $upPetugas], 200);
        }
        return response()->json(['Error saat update petugass'], 404);
    }

    public function delete($id) {
        $delPetugas = Petugas::findOrFail($id);

        if ($delPetugas->delete()) {
            return response()->json(['msg' => 'Petugas telah dihapus'], 200);
        }
        return response()->json(['msg' => 'Gagal menghapus petugas'], 404);
    }
}

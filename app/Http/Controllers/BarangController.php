<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Photo;

class BarangController extends Controller
{
    //
    public function index () {
        $dataBarang = Barang::all();

        return view('adminpetugas/barang', ['list_barang' => $dataBarang]);
    }

    public function add(Request $request) {
        //Insert barang data
        $this->validate($request, [
            'nama_barang' => 'required',
            'harga_awal' => 'required|digits_between:1,20',
            'deskripsi_barang' => 'required'
        ]);
        //Set tanggal
        $tgl = date('Y-m-d');

        $newBarang = new Barang([
            'nama_barang' => $request->nama_barang,
            'tgl' => $tgl,
            'harga_awal' => $request->harga_awal,
            'deskripsi_barang' => $request->deskripsi_barang
        ]);

        $newBarang->save();
        //Get new barang id
        $idNew = $newBarang->id_barang;

        //Photo
        $filePhoto = $request->file('photo');

        //Loop file store
        $namaFile = array();
        $i = 0;
        $tujuanUpload = 'barangPhotos';
        foreach ($filePhoto as $file) {
            $namaFile[$i] = time()."_".$file->getClientOriginalName();        
            $file->move($tujuanUpload,$namaFile[$i]);
    
            Photo::create([
                'id_barang' => $idNew,
                'photo_name' => $namaFile[$i]
            ]);
            $i++;
        }
        // return response()->json(['msg' => 'Barang tersimpan'],200);
        return redirect('barang');
    }

    public function detailbarang ($id) {
        $dataBarang = Barang::where('id_barang', $id)->get();
        $photoBarang = Photo::where('id_barang', $id)->get();
        $barang = [
            'data' => $dataBarang,
            'photo' => $photoBarang
        ];
        return $barang; 
    }
}
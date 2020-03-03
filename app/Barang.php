<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = ['nama_barang','tgl','harga_awal','deskripsi_barang'];
    public $primaryKey = 'id_barang';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    //
    protected $fillable = ['nama_petugas','username','password','id_level'];
    public $primaryKey = 'id_petugas';
}

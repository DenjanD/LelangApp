<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    //
    protected $fillable = ['nama_lengkap','username','password','telp'];
    public $primaryKey = 'id_user';
}

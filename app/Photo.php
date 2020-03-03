<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['id_barang','photo_name'];
    public $primaryKey = 'id_photo';
}

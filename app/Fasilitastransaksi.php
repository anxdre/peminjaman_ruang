<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitastransaksi extends Model
{
    //
    protected $table = "fasilitas_transaksis";
    function fasilitas(){
    	return $this->hasOne('App\Fasilitas','id','id_fasilitas');
    }
}

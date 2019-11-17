<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    //
    function fasilitas_transaksi(){
    	return $this->belongsTo('App\Fasilitastransaksi');
    }
}

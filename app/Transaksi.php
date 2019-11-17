<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    function user(){
    	return $this->hasOne('App\User', 'id', 'id_user');
    }
}

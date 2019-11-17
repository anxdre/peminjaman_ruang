<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
   	function fasil(){
   		return $this->hasOne('App\Fasilitas', 'id', 'id_fasil');
   	}
}

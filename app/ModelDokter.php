<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelDokter extends Model
{
    public function periksa(){
    	return $this->hasMany('App\ModelPeriksa', 'dokter_id');
    }
}

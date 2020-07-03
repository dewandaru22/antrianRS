<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelDokter extends Model
{
    protected $table = "dokter";

    public function periksa(){
    	return $this->hasMany('App\ModelPeriksa', 'dokter_id');
    }

    public function antrian(){
    	return $this->hasOne('App\Antrian', 'dokter_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPeriksa extends Model
{
    protected $table = "periksa";

    // public function pasien(){
    // 	return $this->belongsTo('App\ModelPasien', 'id');
    // }

    // public function dokter(){
    // 	return $this->belongsTo('App\ModelDokter', 'id');
    // }
}

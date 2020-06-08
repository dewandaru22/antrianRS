<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPasien extends Model
{
    public function periksa(){
    	return $this->hasOne('App\ModelPeriksa', 'pasien_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = "antrian";

    public function head()
    {
        return $this->belongsTo('App\Periksa', 'head');
    }

    public function tail()
    {
        return $this->belongsTo('App\Periksa', 'tail');
    }
}

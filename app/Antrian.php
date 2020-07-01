<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = "antrian";

    public function heads()
    {
        return $this->belongsTo('App\ModelPeriksa', 'head');
    }

    public function tails()
    {
        return $this->belongsTo('App\ModelPeriksa', 'tail');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function naik ()
    {
        //get data berkaitan
        $data = Antrian::where(id, $id);

        $depan = Antrian::where(id, $data->front);

        $blkg = Antrian::where(id, $data->back);

        //ubah urutan

        $data->front = $depan->front;
        $data->back = $depan->id;

        $depan->front = $data->id;
        $depan->back = $data->back;

        $blkg->front = $depan->id;
    }
}

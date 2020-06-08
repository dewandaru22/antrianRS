<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelPeriksa;

class PeriksaController extends Controller
{
     public function index()
     {
     	$periksa = ModelPeriksa::all();
     	return view('perawat/perawat', compact('periksa'));
     }

     public function edit($id)
     {
          $periksa = ModelPeriksa::where('id','=',$id)->get();
          return view('perawat/perawat', compact('periksa'));
     }

     public function update(Request $request, $id)
    {
     
        // $periksa = ModelPeriksa::where('id',$id)->first();
        // $periksa->nomor_periksa = $request->nomor_periksa;
        // $periksa->pasien_id = $request->pasien_id;
        // $periksa->dokter_id = $request->dokter_id;
        // $periksa->tanggal = $request->tanggal;
        // $periksa->status = $request->status;
        // $periksa->save();
        // return redirect('/perawat');

        $periksa = ModelPeriksa::where('id',$id)->first();
        $periksa->status = $request->status;
        $periksa->save();

        return redirect()->route('perawat.update');
    }
}

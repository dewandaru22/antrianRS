<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelPeriksa;
use App\ModelDokter;
use App\Antrian;
use Session;

class PeriksaController extends Controller
{
     public function index($id = null)
     {
        $antrian = Antrian::where('dokter_id', $id)->first();
        $array = ModelPeriksa::where('status', '!=', 'Selesai')->get();
        $dokter = ModelDokter::get();
        // dd($dokter);
        $array = $array->toArray();
        // dd($periksa);
        $periksa = array();
        if ($antrian) {
            # code...
            $queue = $antrian->head;
            $i = 0;
            $stop = false;
            while (!$stop) {
                $key = array_search($queue, array_column($array, 'id'));
                array_push($periksa, $array[$key]);
                $queue = $array[$key]['next'];
                $i++;
                if ($queue == null) {
                    $stop = true;
                }
            }
        }

        // dd($periksa);
     	return view('perawat/perawat', compact('periksa', 'antrian', 'dokter'));
     }

     public function done($id){
         
        $data = ModelPeriksa::findOrFail($id);
        $antrian = Antrian::where('head', $id)->first();

        $next = ModelPeriksa::where('id',$data->next)->first();
        $next->previous = null;
        $next->save();

        $data->status = 'Selesai';
        $data->previous = null;
        $data->next = null;
        $data->save();

        $antrian->head = $next->id;
        $antrian->save();
        
        Session::flash('success','Antrian Berhasil di Ubah!');

        return redirect()->route('perawat.index', $antrian->dokter_id);
     }

     public function edit($id)
     {
          $periksa = ModelPeriksa::where('id','=',$id)->get();
          //return view('perawat/perawat', compact('periksa'));
          return response()->json($periksa);
     }

     public function update(Request $request, $id)
    {
        $periksa = ModelPeriksa::where('id',$id)->first();
        $periksa->status = $request->status;
        $periksa->save();

        Session::flash('success','Status Berhasil di Ubah!');

        return redirect()->route('perawat.index');
     
        // $periksa = ModelPeriksa::where('id',$id)->first();
        // $periksa->nomor_periksa = $request->nomor_periksa;
        // $periksa->pasien_id = $request->pasien_id;
        // $periksa->dokter_id = $request->dokter_id;
        // $periksa->tanggal = $request->tanggal;
        // $periksa->status = $request->status;
        // $periksa->save();
        // return redirect('/perawat');

    }

    public function infoAntrian(){
        $antrian = Antrian::with('heads', 'tails')->first();
        $count = ModelPeriksa::where('status', 'Menunggu')->count();
        // dd($antrian->heads->next);
        $data = ModelPeriksa::where('id',$antrian->heads->next)->first();

        return view('/antrian', compact('data', 'antrian', 'count'));
    }

    public function signage(){
        $antrian = Antrian::where('heads','dokter_id', $id)->first();
        $data = ModelPeriksa::where('id',$antrian->heads->next)->first();

        $selesai = ModelPeriksa::where('status', 'Selesai')->get();

        $array = ModelPeriksa::where('status', 'Menunggu')->get();

        $dokter = ModelDokter::get();
        // dd($periksa);
        $array = $array->toArray();
        // dd($periksa);
        $periksa = array();
        if ($antrian) {
            # code...
            $queue = $antrian->head;
            $i = 0;
            $stop = false;
            while (!$stop) {
                $key = array_search($queue, array_column($array, 'id'));
                array_push($periksa, $array[$key]);
                $queue = $array[$key]['next'];
                $i++;
                if ($queue == null) {
                    $stop = true;
                }
            }
        }
        //dd($periksa);
        return view('/websignage', compact('data', 'antrian', 'periksa', 'selesai'));
    }
}

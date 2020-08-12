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
        //dd($antrian);
        $array = ModelPeriksa::where('status', '!=', 'Selesai')->get();
        $dokter = ModelDokter::get();
        // dd($dokter);
        $array = $array->toArray();
        $periksa = array();
        if ($antrian) {
            if ($antrian->head == null){
                $stop = true;
            }else{
                $stop=false;
            }
            # code...
            $queue = $antrian->head;
            $i = 0;
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
     	return view('perawat/perawat', compact('periksa', 'antrian', 'dokter', 'id'));
     }

     public function done($id){
         
        $data = ModelPeriksa::findOrFail($id);
        $antrian = Antrian::where('head', $id)->first();

        $next = ModelPeriksa::where('id',$data->next)->first();
        if($next != null){
            $next->previous = null;
            $next->save();
            $antrian->head = $next->id;
        }
        else{
            $antrian->head = null;
            $antrian->tail = null;
        }

        $data->status = 'Selesai';
        $data->previous = null;
        $data->next = null;
        $data->save();

        $antrian->save();
        
        Session::flash('success','Antrian Selesai Diperiksa!');

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

        return redirect()->route('perawat.index', $periksa->dokter_id);
    }

    public function infoAntrian(){

        $antrian = Antrian::with('heads')->get();

        $data = ModelDokter::with('antrian.heads', 'periksa')->get();

        return view('/antrian', compact('data', 'antrian'));
    }

    public function signage($id = null){
        $antrian = Antrian::with('heads')->where('dokter_id', $id)->first();
        $dokter = ModelDokter::get();
        $selesai = ModelPeriksa::where('dokter_id', $id)->where('status', 'Selesai')->get();
        $data = null;

        if($antrian->head){
            $data = ModelPeriksa::where('id',$antrian->heads->next)->first();

            $array = ModelPeriksa::where('status', '!=', 'Selesai')->get();
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
        return view('/websignage', compact('antrian', 'periksa', 'selesai', 'dokter', 'data'));
        }else{
        return view('/websignage', compact('dokter', 'antrian', 'selesai', 'data'));
        }
    }

    public function monitorDokter(){
        $dokter = ModelDokter::get();
        return view('/signagePeriksa', compact('dokter'));
    }

    public function ruanganDokter($id){
        $antrian = Antrian::with('heads')->where('dokter_id', $id)->first();

        $dokter = ModelDokter::where('id', $id)->first();
        $data = null;

        if($antrian->head){
            $data = ModelPeriksa::where('id',$antrian->heads->next)->first();

            $array = ModelPeriksa::where('status', '!=', 'Selesai')->get();
            $array = $array->toArray();
            $periksa = array();
            if ($antrian) {
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
        return view('/ruanganDokter', compact('antrian', 'periksa','data', 'dokter'));
        }else{
        return view('/ruanganDokter', compact( 'antrian', 'dokter'));
        }

    }

}

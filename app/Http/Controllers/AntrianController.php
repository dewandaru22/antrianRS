<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antrian;
use Session;
use App\ModelPeriksa;

class AntrianController extends Controller
{

    public function add (Request $request){
        $antrian = Antrian::first();

        //sambungkan data baru ke data tail
        $new = new ModelPeriksa;
        $new->previous = $antrian->tail;
        //Isi data lain
        $new->nomor_periksa = $request->nomor_periksa;
        $new->pasien_id = $request->pasien_id;
        $new->dokter_id = $request->dokter_id;
        $new->tanggal = $request->tanggal;
        $new->status = $request->status;
        $new->save();

        if(!$antrian->tail){
            $antrian->head=$new->id;
            $antrian->tail=$new->id;
            $antrian->save();
        }
        else{
            //sambungkan data tail ke data baru
            $tail = ModelPeriksa::where('id', $antrian->tail)->first();
            $tail->next = $new->id;
            $tail->save();

            //ganti tail ke data baru
            $antrian->tail = $new->id;
            $antrian->save();
        }
        return response()->json(['success'=>true]);
    }

    public function naik ($id)
    {
        $antrian = Antrian::first();
        
        //get data berkaitan
        $data = ModelPeriksa::where('id',$id)->first();

        if ($antrian->head == $data->previous) {
            $antrian->head = $data->id;

            $exchange = ModelPeriksa::where('id',$data->previous)->first();
    
            $depan = null;
    
            $blkg = ModelPeriksa::where('id',$data->next)->first();
    
            //ubah urutan
    
            $data->previous = $exchange->previous;
            $temp = $data->next;
            $data->next = $exchange->id;
    
            $exchange->previous = $data->id;
            $exchange->next = $temp;
    
            // $depan->next = $data->id;
            $blkg->previous = $exchange->id;
            
        } else {
            $exchange = ModelPeriksa::where('id',$data->previous)->first();
    
            $depan = ModelPeriksa::where('id',$exchange->previous)->first();
    
            $blkg = ModelPeriksa::where('id',$data->next)->first();
    
            //ubah urutan
    
            $data->previous = $exchange->previous;
            $temp = $data->next;
            $data->next = $exchange->id;
    
            $exchange->previous = $data->id;
            $exchange->next = $temp;
    
            $depan->next = $data->id;
            $blkg->previous = $exchange->id;

            $depan->save();
            
        }

        $data->save();
        $exchange->save();
        $blkg->save();
        $antrian->save();
        
        Session::flash('success','Antrian Berhasil di Ubah!');

        return redirect()->route('perawat.index');
    }

    public function turun ($id)
    {
        $antrian = Antrian::first();
        
        //get data berkaitan
        $data = ModelPeriksa::where('id',$id)->first();

        if ($antrian->tail == $data->next) {
            $antrian->tail = $data->id;

            $exchange = ModelPeriksa::where('id',$data->next)->first();
    
            $depan = ModelPeriksa::where('id',$data->previous)->first();
    
            $blkg = null;
    
            //ubah urutan
    
            $temp = $data->previous;
            $data->previous = $exchange->id;
            $data->next = $exchange->next;
    
            $exchange->previous = $temp;
            $exchange->next = $data->id;
    
            $depan->next = $exchange->id;
            
        } else {
            $exchange = ModelPeriksa::where('id',$data->next)->first();
    
            $depan = ModelPeriksa::where('id',$data->previous)->first();
    
            $blkg = ModelPeriksa::where('id',$exchange->previous)->first();
    
            //ubah urutan
    
            $temp = $data->previous;
            $data->previous = $exchange->id;
            $data->next = $exchange->next;
    
            $exchange->previous = $temp;
            $exchange->next = $data->id;
    
            $depan->next = $exchange->id;
            $blkg->previous = $data->id;

            $blkg->save();
            
        }

        $data->save();
        $exchange->save();
        $depan->save();
        $antrian->save();
        
        Session::flash('success','Antrian Berhasil di Ubah!');

        return redirect()->route('perawat.index');
    }

}

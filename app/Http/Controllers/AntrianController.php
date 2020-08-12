<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antrian;
use Session;
use App\ModelPeriksa;

class AntrianController extends Controller
{

    public function add (Request $request){
        $antrian = Antrian::where('dokter_id', $request->dokter_id)->first();
        if(!$antrian){
            $antrian = new Antrian;
        }

        $antrian->dokter_id = $request->dokter_id;

        //sambungkan data baru ke data tail
        $new = new ModelPeriksa;
        $new->previous = $antrian->tail;
        //Isi data lain
        $new->nomor_periksa = $request->nomor_periksa;
        $new->pasien_id = $request->pasien_id;
        $new->dokter_id = $request->dokter_id;
        $new->users_id = $request->users_id;
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
        //get data berkaitan
        $data = ModelPeriksa::where('id',$id)->first();

        $antrian = Antrian::where('dokter_id', $data->dokter_id)->first();
        
        $exchange = ModelPeriksa::where('id',$data->previous)->first();

        //ubah urutan

        if ($antrian->tail == $data->id) {
            $antrian->tail = $data->previous;
        }
        if ($antrian->head == $data->previous) {
            $antrian->head = $data->id;
        }

        if ($exchange->previous) {
            $data->previous = $exchange->previous;
            $depan = ModelPeriksa::where('id',$exchange->previous)->first();
            $depan->next = $data->id;
            $depan->save();
        }else{
            $exchange->previous = null;
        }

        if ($data->next) {
            $exchange->next = $data->next;
            $blkg = ModelPeriksa::where('id',$data->next)->first();
            $blkg->previous = $exchange->id;
            $blkg->save();
        }else {
            $exchange->next = null;
        }

        $data->next = $exchange->id;
        $exchange->previous = $data->id;

        $data->save();
        $exchange->save();
        $antrian->save();
        
        Session::flash('success','Antrian Berhasil Diubah!');

        return redirect()->route('perawat.index', $antrian->dokter_id);
    }

    public function turun ($id)
    {
        //get data berkaitan
        $data = ModelPeriksa::where('id',$id)->first();
        $antrian = Antrian::where('dokter_id', $data->dokter_id)->first();

        $exchange = ModelPeriksa::where('id',$data->next)->first();

        //ubah urutan

        if ($antrian->tail == $data->next) {
            $antrian->tail = $data->id;
        }
        if ($antrian->head == $data->id) {
            // dd('test');
            $antrian->head = $data->next;
        }

        if ($data->previous) {
            $exchange->previous = $data->previous;
            $depan = ModelPeriksa::where('id',$data->previous)->first();
            $depan->next = $exchange->id;
            $depan->save();
        }else{
            $exchange->previous = null;
        }

        if ($exchange->next) {
            $data->next = $exchange->next;
            $blkg = ModelPeriksa::where('id',$exchange->next)->first();
            $blkg->previous = $data->id;
            $blkg->save();
        }else {
            $data->next = null;
        }

        $data->previous = $exchange->id;
        $exchange->next = $data->id;

        $data->save();
        $exchange->save();
        $antrian->save();
        
        Session::flash('success','Antrian Berhasil Diubah!');

        return redirect()->route('perawat.index', $antrian->dokter_id);
    }

}

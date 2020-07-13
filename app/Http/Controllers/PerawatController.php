<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class PerawatController extends Controller
{
    public function data(){
        // dd("test");
        // dd(Auth::user());
        $data = User::where('id',Auth::user()->id)->first();
        // dd($data);
        
        return view ('perawat/profilePerawat', compact('data'));
    }
}

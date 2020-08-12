<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class PerawatController extends Controller
{
    public function data(){
        $data = User::where('id',Auth::user()->id)->first();
        
        return view ('perawat/profilePerawat', compact('data'));
    }
}

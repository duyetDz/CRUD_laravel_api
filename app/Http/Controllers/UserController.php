<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $resuft['username'] = "Giang Van Duyet";
        $resuft['password'] = "daylamatkhau";
        return view('about',compact('resuft'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(Request $request){
        $data = [];

        $session_name = $request->session()->has('name') ?
        $request->session()->pull('name') : 'none' ;
        
        $data['session_name'] = $session_name;
        return view('adminHome',$data);
    }    
}

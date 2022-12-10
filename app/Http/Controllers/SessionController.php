<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(Request $req){
        $req->session()->put('data', $req->input());
      //  return $req->session()->get('data');
      return redirect('home_page_session');
    }

    //public function logout(){
    //    return redirect('session');
    //}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function checarSession(){
        if(Auth::user()){
            return redirect('administrar');
        }else{  
            return redirect('login');
        }
    }
}

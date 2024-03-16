<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    
    public function welcome (){
        return view('welcome');
    }

    public function dashboard (){
        return view('dashboard');
    }
    public function about (){
        return view('about');
    }
    public function contact (){
        return view('contact');
    }
    
   
  
}

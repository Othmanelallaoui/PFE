<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\DemandeRecrutment;

class StaticController extends Controller
{
    
    public function welcome (){
        return view('welcome');
    }

    public function dashboard() {
        $numberOfEmployees = Employee::where('role', 'employee')->count();
        $numberOfCondidat = Employee::where('role', 'condidat')->count();
        $recrutementRequests = DemandeRecrutment::count();
        
        return view('dashboard', compact('numberOfEmployees', 'numberOfCondidat','recrutementRequests'));
    }
    
    public function about (){
        return view('about');
    }
    public function contact (){
        return view('contact');
    }
   
    
   
  
}

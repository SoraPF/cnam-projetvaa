<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{    
    public function inscritMardi(){
        $user = auth()->user(); // Assuming users are authenticated

        $cours = Cours::all();      

        return view('inscriptionCours',['courses' => $cours]);
    }

    public function inscritvendredi(){

        return view('inscriptionCours',[]);
    }
}

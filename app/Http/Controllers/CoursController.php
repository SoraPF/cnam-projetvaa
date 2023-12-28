<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function inscritMardi(){
        //$mardi = new ;
        return view('inscriptionCours',[]);
    }

    public function inscritvendredi(){

        return view('inscriptionCours',[]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cours;
use App\Models\cours_rameur;


class DashboardController extends Controller
{
    public function index()
    {
        $participants = User::all();

        return view('dashboard', [
            'users' => $participants,
        ]);
    }
    public function create()
    {
        return view('newparticipant', []);
    }

    public function inscriptionCours()
    {
        $cours = cours::all();
        $cours_rameur = cours_rameur::all();
        return view('inscriptionCours', ['cours' => $cours, 'cours_rameur' => $cours_rameur])->with('success', 'Inscription successful.');
    }
}
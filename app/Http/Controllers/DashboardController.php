<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('inscriptionCours',[]);
    }
}

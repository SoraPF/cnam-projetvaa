<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Cours;
use App\Models\cours_rameur;
use Illuminate\Http\Request;

class CoursController extends Controller
{    
    public function inscritMardi(){
        $user = auth()->user(); // Assuming users are authenticated
        $cours = cours::all();        
        
        $mardiCours = Cours::where('jours', 'Mardi')->first();
        $vendrediCours = Cours::where('jours', 'vendredi')->first();
        
        if ($mardiCours) {
            // Create a new record in the cours_rameur table
            cours_rameur::create([
                "cours_id" => $mardiCours->id,
                "rameur_id" => $user->id,
            ]);
            $cours_rameur = cours_rameur::all();

            return view('inscriptionCours', ['cours' => $cours, 'cours_rameur' => $cours_rameur])->with('success', 'Inscription successful.');
        } else {
            return view('inscriptionCours', ['cours' => $cours])->with('error', 'Mardi course not found.');
        }
    }

    public function inscritvendredi(){
        $user = auth()->user(); // Assuming users are authenticated
        $cours = cours::all();        
        
        $mardiCours = Cours::where('jours', 'Mardi')->first();
        $vendrediCours = Cours::where('jours', 'vendredi')->first();
        
        if ($vendrediCours) {
            // Create a new record in the cours_rameur table
            cours_rameur::create([
                "cours_id" => $vendrediCours->id,
                "rameur_id" => $user->id,
            ]);
            $cours_rameur = cours_rameur::all();
            return view('inscriptionCours', ['cours' => $cours, 'cours_rameur' => $cours_rameur])->with('success', 'Inscription successful.');
        } else {
            return view('inscriptionCours', ['cours' => $cours])->with('error', 'Mardi course not found.');
        }
    }
    
    public function pageCreateCours(){
        $user = auth()->user();
        $id = $user->id;
        return view('createCours',compact('id'));
    }
    public function createCours(Request $request): RedirectResponse{
        //add create cours       
        $incomingFields = $request->validate([
            'titre'=>['required','min:3'],
            'jours'=>['required'],
            'niveau'=>['required'],
            'id'=>['required'],
         ]);     

         Cours::create([
            'titre' => $request->titre,
            'niveau' => $request->niveau,
            'jours' => $request->jours,
            'coach_id' => $request->id,
            'description' => "",
        ]);
 
         return redirect('/dashboard/cours/create');
    }
}
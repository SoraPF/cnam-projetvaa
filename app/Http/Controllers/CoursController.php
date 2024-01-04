<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Log;
use App\Models\cours;
use App\Models\cours_rameur;
use Illuminate\Http\Request;

class CoursController extends Controller
{    
    public function inscritMardi(){
        $user = auth()->user(); // Assuming users are authenticated
        $cours = cours::all();        
        
        $mardiCours = cours::where('jours', 'Mardi')->first();
        $vendrediCours = cours::where('jours', 'vendredi')->first();
        
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
        
        $mardiCours = cours::where('jours', 'Mardi')->first();
        $vendrediCours = cours::where('jours', 'vendredi')->first();
        
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

         try{
            cours::create([
                'titre' => $request->titre,
                'niveau' => $request->niveau,
                'jours' => $request->jours,
                'coach_id' => $request->id,
                'description' => "",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect('/dashboard/cours/create');
        } catch (QueryException $e) {            
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function gestionCours(Request $request){
        if($request->jour == 'mardi'){
            $content = cours::where('jours',"=",'mardi')->first();
            if($content){
                $participants = cours_rameur::where('id_cours','=',$content);
                foreach($participants as $value){
                    $participants_name += $value->name;
                }
                return view('gestionCours',compact('participant_name'));
            }                   
        }elseif($request->jour == 'vendredi'){
            $content = cours::where('jours',"=",'vendredi')->first();
            if($content){
                $participants = cours_rameur::where('id_cours','=',$content);
                foreach($participants as $value){
                    $participants_name += $value->name;
                }
                return view('gestionCours',compact('participant_name'));
            }
        }
        return view('gestionCours');        
    }
}
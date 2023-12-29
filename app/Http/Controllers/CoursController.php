<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
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
    
    public function pageCreateCours(){
        $user = auth()->user();
        $id = $user->id;
        return view('createCours',compact('id'));
    }
    public function createCours(Request $request): RedirectResponse{
        //add create cours       
        $incomingFields = $request->validate([
            'titre'=>['required','min:3'],
            'niveau'=>['required'],
            'id'=>['required'],
         ]);
 
         $incomingFields['password'] = bcrypt($incomingFields['password']);
 
         $myUser = new User;
         $myUser->name = $request->name;
         $myUser->email = $request->email;
         $myUser->telephone = $request->telephone;
         $myUser->password = $request->password;
         $myUser->save();
 
         return redirect('/dashboard/createCours');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;


class NewParticipant extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $incomingFields = $request->validate([
           'name'=>['required','min:3'],
           'email'=>['required','email'],
           'telephone'=>['required','telephone','min:8'],
           'password'=>'required',
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $myUser = new User;
        $myUser->name = $request->name;
        $myUser->email = $request->email;
        $myUser->telephone = $request->telephone;
        $myUser->password = $request->password;
        $myUser->save();

        return redirect('/dashboard');
    }

    public function edite(Request $request) {
        return view('editeparticipant', []);
    }

    public function suppression(User $user){
        $user->delete();

        return back()->with("successDelete","user supprimé avec succès!");
    }
}

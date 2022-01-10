<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function displayUsersAdmin(){
        $users = User::all();

        return view('admin/users_view_admin', [
            'users'=> $users
        ]);
    }

    /* Afficher le formulaire */
    public function create(){

        return view('admin/add_user_admin');
    }


    /* Ajouter un nouvel utilisateur */
    public function addUser(Request $request){

        /* Validation des inputs */
        $request->validate([
            'name' => ['required', 'string','min:1', 'max:70', 'unique:posts'],
            'email' => ['required', 'string', 'max:500'],
            'password' => ['required', 'string'],
            'admin' => ['required', 'string']
        ]);

            /* Création d'un nouvel objet */
            $post= new User();
            $post->name =  $request->input('name');
            $post->email = $request->input('email');
            $post->password = $request->input('password');
            $post->admin = $request->input('admin');

            $post->save();

        return redirect()->back()->with('status', 'L\'utilisateur a été créé avec succès !');
    }

    /* Afficher le formulaire d'édition d'un utilisateur */
    public function editUser($id){
        $user = User::findOrFail($id);

        return view('admin/edit_user_admin', [
            'user' => $user
        ]);
    }


    /* Envoyer le formulaire à la BDD */
    public function submitEdit(Request $request, $id){

        $request->validate([
            'name' => ['required', 'string','min:1', 'max:70'],
            'email' => ['required','string', 'max:500'],
            'password' => ['required', 'date'],
            'admin' => ['required', 'string']
        ]);
            $update = User::find($id);
            $update->name =  $request->input('name');
            $update->email = $request->input('email');
            $update->password = $request->input('password');
            $update->admin = $request->input('admin');

            $update->update();
            return redirect()->back()->with('status', 'L\'utilisateur a été modifié avec succès !');

        }
}

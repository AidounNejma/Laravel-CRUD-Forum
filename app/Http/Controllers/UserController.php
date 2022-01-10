<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'name' => ['required', 'string','min:1', 'max:70', 'unique:users'],
            'email' => ['required', 'string', 'max:500'],
            'password' => ['required', 'string'],
            'admin' => [ 'string']
        ]);

            /* Création d'un nouvel objet */
            $user= new User();
            $user->name =  $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->admin = $request->input('admin');

            $user->save();

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
            'password' => ['required'],
            'admin' => ['required']
        ]);
            $update = User::find($id);
            $update->name =  $request->input('name');
            $update->email = $request->input('email');
            $update->password = Hash::make($request->input('password'));
            $update->admin = $request->input('admin');

            $update->update();
            return redirect()->back()->with('status', 'L\'utilisateur a été modifié avec succès !');

        }

        /* Supprimer un utilisateur */
        public function destroyUser($id){
            $user= User::find($id);

            $user->delete();
            return redirect()->back()->with('status', 'L\'utilisateur a été supprimé avec succès !');
        }
}

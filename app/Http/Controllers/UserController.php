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
}

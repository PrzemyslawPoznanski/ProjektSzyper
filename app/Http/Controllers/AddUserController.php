<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AddUserController extends Controller
{

    public function addUser(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => 'required',
        ]);


        $user = new User;
        $user ->name=$request->name;
        $user ->email=$request->email;
        $user ->password=Hash::make($request-> password);
        $user ->role=$request->role;

        $user ->save();
        return redirect('/');
    }
}

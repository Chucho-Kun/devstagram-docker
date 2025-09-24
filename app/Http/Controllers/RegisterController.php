<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }
    
    public function store(Request $request) 
    {
        //dd($request->get('name'));
        //validar
        $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => Str::slug( $request->username ),
            'email' => $request->email,
            'password' => $request->password
        ]);
    }
    
   
}

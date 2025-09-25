<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }
    
    public function store(Request $request) 
    {
        //dd($request->get('name'));
        // modificar el request
        $request->request->add(['username' => Str::slug($request->username) ]);

        //validar
        $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        //auth()->attempt($request->only('email','password'));
        Auth::attempt($request->only('email','password'));

        //Redireccion
        return redirect()->route('posts.index');
    }
    
   
}

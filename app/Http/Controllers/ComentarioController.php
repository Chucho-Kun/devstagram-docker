<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user , Post $post)
    {
        // validar mensaje
        $request->validate([
            'comentario' => 'required|max:225'
        ]);
        // guardar mensaje en bd
        Comentario::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);
        // regresar mensaje 
        return back()->with('mensaje' , 'Comentario Realizado Correctamente');
    }
}

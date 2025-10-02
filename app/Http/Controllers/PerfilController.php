<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Str;

class PerfilController extends Controller
{
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        // Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => [
                'required',
                'min:3',
                'max:20',
                'not_in:narco,puta,zorra,sicario',
                'unique:users,username,' . Auth::user()->id
            ],
            'email' => 'required|min:6'
        ]);

        if($request->imagen){
             
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::read($imagen);
            $imagenServidor->cover(800,800);

            $imagePath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagePath);
        }

        // Guardar cambios

        $usuario = User::find(Auth::user()->id);

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? Auth::user()->imagen ?? '';
        $usuario->save();

        // Redireccionar al Usuario
        return redirect()->route('posts.index' , $usuario->username);
    }
}


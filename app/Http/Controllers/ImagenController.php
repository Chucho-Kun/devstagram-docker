<?php

namespace App\Http\Controllers;

use Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        //$input = $request->all();
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $imagenServidor = Image::read($imagen);

        $imagenServidor->cover(800,800);

        $imagePath = public_path('uploads') . '/' . $nombreImagen;

        $imagenServidor->save($imagePath);

        return response()->json(['imagen' => $nombreImagen ]);
    }
    
    public function avatar(Request $request)
    {
        //$input = $request->all();
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $imagenServidor = Image::read($imagen);

        $imagenServidor->cover(800,800);

        $imagePath = public_path('perfiles') . '/' . $nombreImagen;

        $imagenServidor->save($imagePath);

        return response()->json(['imagen' => $nombreImagen ]);
    }
}

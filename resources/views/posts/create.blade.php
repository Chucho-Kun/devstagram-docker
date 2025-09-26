@extends('layouts.app');

@section('titulo')
    Crear una nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            Imagen Aquí
        </div>
        
        <div class="md:w-1/2 px-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            
        
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
            <div class="mb-5">
                <label class="my-4 block uppercase text-gray-500 font-bold" for="name">
                    Nombre
                </label>
                <input 
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Tu Nombre de Usuario"
                    class="border border-gray-300 p-3 w-full rounded-lg @error('name') bg-gray-100 @enderror"
                    value="{{ old('name') }}"
                >
            </div>
            @error('name')
                <p class="bg-red-500 text-white text-sm p-2 text-center mt-2">{{ $message }}</p>
            @enderror
            
            </form>
      

        </div>
    </div>
@endsection


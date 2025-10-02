@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form 
                action="{{ route('perfil.store') }}"
                class="mt-10 md:mt-0"
                method="POST"
                enctype="multipart/form-data"
            >
            @csrf
                <div class="mt-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                        Username
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu Nombre de Usuario"
                        class="border border-gray-300 p-3 w-full rounded-lg @error('name') bg-gray-100 @enderror"
                        value="{{ auth()->user()->username }}"
                    >
                    @error('username')
                        <p class="bg-red-500 text-white text-sm p-2 text-center mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="text"
                        placeholder="Tu Email de Usuario"
                        class="border border-gray-300 p-3 w-full rounded-lg @error('name') bg-gray-100 @enderror"
                        value="{{ auth()->user()->email }}"
                    >
                    @error('email')
                        <p class="bg-red-500 text-white text-sm p-2 text-center mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="imagen">
                        Imagen Perfil
                    </label>
                  
                    <input 
                        id="imagen"
                        name="imagen"
                        type="file"
                        class="border border-gray-300 p-3 w-full rounded-lg"
                        value=""
                        accept=".jpg,.jpeg,.png,.webp"
                    >
                    @error('imagen')
                        <p class="bg-red-500 text-white text-sm p-2 text-center mt-2">{{ $message }}</p>
                    @enderror
                    
                </div>

                <input 
                    type="submit"
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5"
                >
            </form>
        </div>
    </div>
@endsection
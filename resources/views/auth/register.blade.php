@extends('layouts.app')

@section('titulo')
Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <img 
                src="{{ asset('img/registrar.jpg') }}" 
                alt="imagen registro de usuario"
            >
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow text-left">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
            <div class="mt-5">
                <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">
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
            
            <div class="mt-5">
                <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                    Username
                </label>
                <input 
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Tu Nombre"
                    class="border border-gray-300 p-3 w-full rounded-lg @error('username') bg-gray-100 @enderror"
                    value="{{ old('username') }}"
                >
            </div>
            @error('username')
                <p class="bg-red-500 text-white text-sm p-2 text-center mt-2">{{ $message }}</p>
            @enderror
            
            <div class="mt-5">
                <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                    Email
                </label>
                <input 
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Tu Email"
                    class="border border-gray-300 p-3 w-full rounded-lg @error('email') bg-gray-100 @enderror"
                    value="{{ old('email') }}"
                >
            </div>
            @error('email')
                <p class="bg-red-500 text-white text-sm p-2 text-center mt-2">{{ $message }}</p>
            @enderror
            
            <div class="mt-5">
                <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                    Password
                </label>
                <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Tu Password"
                    class="border border-gray-300 p-3 w-full rounded-lg @error('password') bg-gray-100 @enderror"
                    value="{{ old('password') }}"
                >
            </div>
            @error('password')
                <p class="bg-red-500 text-white text-sm p-2 text-center mt-2">{{ $message }}</p>
            @enderror
            
            <div class="mt-5">
                <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation">
                    Repetir Password
                </label>
                <input 
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirma Tu Password"
                    class="border border-gray-300 p-3 w-full rounded-lg @error('password_confirmation') bg-gray-100 @enderror"
                >
            </div>

            <input 
                type="submit"
                value="Crear Cuenta"
                 class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5"
            >
            
        </form>
        </div>
    </div>
@endsection
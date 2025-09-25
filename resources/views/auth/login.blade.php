@extends('layouts.app')

@section('titulo')
Inicia Sesión en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <img 
                src="{{ asset('img/login.jpg') }}" 
                alt="imagen login de usuario"
            >
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow text-left">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (@session('mensaje'))
                    <p class="bg-red-500 text-white text-sm p-2 text-center mt-2">{{ session('mensaje') }}</p>
                @endif
            
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

            <input 
                type="submit"
                value="Crear Cuenta"
                 class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5"
            >
            
        </form>
        </div>
    </div>
@endsection
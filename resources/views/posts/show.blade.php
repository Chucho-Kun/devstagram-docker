@extends('layouts.app')


@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="{{ $post->titulo }}">
            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div>
                <a href="{{  route('posts.index' , $post->user->username ) }}">
                    <p class="font-bold">{{ $post->user->username }}</p>
                </a>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
        </div>
        
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                <p class="text-xl font-bold text-center mb-4">Lista de comentarios</p>
            </div>

            @auth
                <form 
                    action=""
                >
                    <div class="mb-3">
                        <label class="my-4 block text-gray-500 font-bold" for="comentario">
                            ¿Que te parece esta publicación?
                        </label>
                        <textarea 
                            name="comentario" 
                            id="comentario" 
                            cols="30" 
                            rows="2"
                            placeholder="Agrega un comentario"
                            class="border border-gray-300 p-3 w-full rounded-lg @error('name') bg-gray-100 @enderror"
                        ></textarea>
                        @error('comentario')
                            <p class="bg-red-500 text-white text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                    <input 
                        type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mb-8 mt-2"
                    >
                </form>
            @endauth
        
        </div>
    </div>
@endsection
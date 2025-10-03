@extends('layouts.app')


@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="{{ $post->titulo }}">

            <div class="p-3 flex items-center gap-4">

                @auth

                <livewire:like-post :post="$post" />

                @if ($post->checkLike( auth()->user() ))
                    
                    {{-- <form method="POST" action="{{ route('posts.likes.destroy' , $post) }}">
                        @method('DELETE')
                        @csrf
                        <div class="my-4">

                            <button type="submit" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="red" class="size-5">
                                    <path d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                                </svg>

                            </button>

                        </div>
                    </form> --}}
                    
                @else
                    
                    <form method="POST" action="{{ route('posts.likes.store' , $post) }}">
                        @csrf
                        <div class="my-4">

                            <button type="submit" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="lightgray" class="size-5">
                                    <path d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                                </svg>

                            </button>

                        </div>
                    </form>
                    
                @endif
                @endauth

                <p>
                    <span class="font-bold">{{ $post->likes->count() }}</span>
                    @choice('Like|Likes' , $post->likes->count())
                </p>

            </div>

            

            <div class="text-left">
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


            @auth
                @if ($post->user_id === auth()->user()->id)
                <form action="{{ route('posts.destroy' , $post) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input 
                        type="submit"
                        value="Eliminar Publicación"
                        class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                    >
                </form>
                @endif
            @endauth

        </div>

        
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5 rounded-2xl">
                <p class="text-xl font-bold text-center mb-4">Lista de comentarios</p>
                <div class="bg-white mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                        @foreach ( $post->comentarios as $comentario )

                        @php
                            $imgUsr = $comentario->user->imagen;
                        @endphp

                            <div class="p-2 text-left flex items-start gap-5">
                                <a href="{{ route('posts.index' , $comentario->user ) }}">
                                    <img class="rounded-full w-8 h-8 object-cover" src="{{ $imgUsr ? asset('perfiles') . '/' . $imgUsr : asset('img/usuario.svg') }}" alt="Imagen de perfil">
                                </a>       
                                
                                <div>
                                    <div class="bg-gray-200 rounded-2xl p-2">
                                        <a href="{{ route('posts.index' , $comentario->user ) }}">
                                            <p class="font-bold">{{ $comentario->user->username }}</p>
                                        </a>
                                        <p>{{ $comentario->comentario }}</p>
                                    </div>
                                    <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                                </div>

                            </div>

                        @endforeach
                    @else
                        <p class="p-10 text-center">Se el primero en comentar</p>
                    @endif
                </div>

                @if(session('mensaje'))
                   <div class="bg-green-500 p-2 text-sm rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{ session('mensaje') }}
                    </div> 
                @endif
            </div>

            @auth
                <form 
                    action="{{ route('comentarios.store' , [ 'user' => $user , 'post' => $post ]) }}"
                    method="POST"
                >
                @csrf
                    <div class="mb-3">
                        <label class="my-4 block text-gray-500 font-bold" for="comentario">
                            ¿Que te parece esta publicación?
                        </label>
                        <textarea 
                            name="comentario" 
                            id="comentario" 
                            cols="30" 
                            rows="2"
                            placeholder="Agrega un comentario como {{ auth()->user()->username }}"
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
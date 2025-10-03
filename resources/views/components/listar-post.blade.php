
<div>
      @if ($posts->count())
        
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ( $posts as $post )
                    <div class="relative">
                        <a href="{{ route('posts.show' , ['post' => $post , 'user' => $post->user ]) }}">
                            <img class="w-full h-auto" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                        </a>
                        <div class="absolute bottom-0 left-0 w-full bg-black text-white text-center p-2">
                            {{ $post->titulo }}
                        </div>
                    </div>
                @endforeach
                
            </div>

            <div class="mt-10">
                {{ $posts->links() }}
            </div>
        
    @else
        <p class="text-center">Sigue a alguien para mostrarte sus últimos posts</p>
    @endif
</div>
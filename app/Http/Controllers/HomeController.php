<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // obtener id de los followers
        $ids = Auth::user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id' , $ids)->latest()->paginate(5);

        return view('home' , [
            'posts' => $posts
        ]);
    }
}

<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Laravel\Facades\Image;

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login' , [LoginController::class, 'index'])->name('login');
Route::post('/login' , [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}' , [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create' , [PostController::class, 'create'])->name('posts.create');
Route::post('/posts' , [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/imagenes' , [ImagenController::class, 'store'])->name('imagenes.store');

// Route::get('/', function (Request $request) {
//     $upload = $request->file('image');
//     $image = Image::read($upload)->resize(300, 200);

//     Storage::put(
//         Str::random() . '.' . $upload->getClientOriginalExtension(),
//         $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 80)
//     );
// });

// Route::get('/', function () {
//     $image = Image::read(Storage::get('example.jpg'))
//         ->scale(300, 200);

//     return response()->image($image, Format::WEBP, quality: 65);
// });
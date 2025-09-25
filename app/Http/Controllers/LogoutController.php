<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        //auth()->logout();
        Auth::logout();
        return redirect()->route('login');
    }
}

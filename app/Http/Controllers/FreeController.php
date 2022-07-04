<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreeController extends Controller
{
    function dashboard()
    {
        $user = User::where('email',session()->get('logged'))->first();
        
        return view('free.dashboard');
    }
}

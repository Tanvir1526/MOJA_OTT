<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PremiumController extends Controller
{
    function dashboard()
    {
        return view('premium.dashboard');
    }
    function profile()
    {
        $user = User::where('user_id',session()->get('logged'))->first();
        return view('premium.profile')->with('user',$user);
        
    }
}

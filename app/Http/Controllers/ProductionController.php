<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContentModel;

class ProductionController extends Controller
{
    function dashboard()
    {
        return view('production.dashboard');
    }
    function upload()
    {
        return view('production.upload');
    }
    function uploadSubmit(Request $req)
    {
        $user = User::where('email',session()->get('logged'))->first();
        $name = $user->email.time().".".$req->file('image')->getClientOriginalExtension();
        $req->file('image')->move(public_path('posters'),$name);
        $mname = $user->email.time().".".$req->file('video')->getClientOriginalExtension();
        $req->file('video')->move(public_path('movies'),$mname);
        
        $content = new ContentModel();
        $content->title = $req->title;
        $content->description = $req->description;
        $content->image = $name;
        $content->video = $mname;
        $content->genre = $req->genre;
        $content->language = $req->language;
        $content->country = $req->country;
        $content->release_date = $req->release_date;
        $content->runtime = $req->runtime;
        $content->director = $req->director;
        $content->cast = $req->cast;
        $content->user_id = User::where('email',session()->get('logged'))->first()->user_id;
        $content->save();
        return redirect()->route('production.upload');
    }
}

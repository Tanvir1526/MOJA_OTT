<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContentModel;
use App\Models\PremiumModel;

class ProductionController extends Controller
{
    function dashboard()
    {
        return view('production.dashboard');
    }
    function contentlist()
    {
        $ContentModels = ContentModel::all();
        return view('production.contentlist')->with('ContentModel',$ContentModels);
    }
    function contentdetails(Request $req)
    {
        $ContentModels = ContentModel::where('user_id', '=', $req->user_id)
                                ->select('title','description','image','video','genre','language','country','release_date','runtime','director','cast','user_id')
                                ->first();
                                
        return view('production.contentdetails')
                    ->with('ContentModel', $ContentModels);
    }
    function upload()
    {
        return view('production.upload');
    }
    function uploadSubmit(Request $req)
    {
        $this->validate($req,
        [
              
                'title'=>'required',
                'description'=>'required',
                'image'=>'required|mimes:php,pdf,docx,xlsx,xlx,jpg,JPG',
                'video'=>'required|mimes:mp4,MP4',
                'genre'=>'required',
                'language'=>'required',
                'country'=>'required',
                'release_date'=>'required',
                'runtime'=>'required',
                'director'=>'required',
                'cast'=>'required',
                'user_id'=>'required'

            ]
        );
        
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
        $content->user_id =$req->user_id;
        $content->save();
        
       // return redirect()->route('production.upload')->with('status', 'uploaded');;
       return "upload successfull";
       function Edit($id)
       {
        //    $user = User::where('email',session()->get('logged'))->first();
        //  //  return view('production.contentedit');
       

         $ContentModel =ContentModel::where('content_id',$id)->first();
        return view('production.contentedit')->with('ContentModel',$ContentModel);
       }
       function updateSubmit(Request $req)
       {
          
           $user = User::where('email',session()->get('logged'))->first();  
           $name = $user->email.time().".".$req->file('pro_pic')->getClientOriginalExtension();
           $req->file('pro_pic')->move(public_path('pro_images'),$name);    
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
        $content->user_id =$req->user_id;
        $content->save();
        return redirect()->route('list');
       }
       function profile()
       {
           $user = User::where('email',session()->get('logged'))->first();
           return view('production.profile')->with('user',$user);
           
           
       }
       function updateSubmit(Request $req)
       {
           
           @$this->validate($req,
                           [
                               "name"=>"max:20|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
                               "email"=>"email",
                               
                               
                   
                           ],
                           [
                               
                               "name.max"=> "Maximum 20 Characters",
                               "name.regex"=>"Please Enter A Valid Name",
                               
                               "email.email"=>"Please Enter A Valid Email Address",
                               
                               
                           ]
                           );
           $user = User::where('email',session()->get('logged'))->first();  
           $name = $user->email.time().".".$req->file('pro_pic')->getClientOriginalExtension();
           $req->file('pro_pic')->move(public_path('pro_images'),$name);               
           $user->name = $req->name;
           $user->pro_pic = $name;
           $user->email = $req->email;
           
           $user->save();
           return redirect()->route('production.profile');
       }
       function updatePasswordSubmit(Request $req)
       {
           $req->validate([
               
               'password' => 'required',
               'new_password' => 'required|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/',
               'conf_password' => 'required|same:new_password',
           ],
           [
           
           'password.required' => 'Password is required',
           'new_password.required' => 'New Password is required',
           'new_password.min' => 'Minimum 8 Characters',
           'new_password.regex' => 'Password must contain at least one number, one letter, one uppercase letter and one lowercase letter',
           'conf_password.required' => 'Confirm Password is required',
           'conf_password.same' => 'Passwords do not match',
           
           
           ]);
   
           $user = User::where('email',session()->get('logged'))->first();
           if($user->password == $req->password)
           {
               $user->password = $req->new_password;
               $user->save();
               return redirect()->route('production.profile');
           }
           else
           {
               session()->flash('msg','Password is incorrect');
               return back();
           }
   
       }
       function viewReport()
       {
        $PremiumModels = PremiumModel::all();
        return view('production.dashbord')->with('PremiumModel',$PremiumModels);
       }
  }
}

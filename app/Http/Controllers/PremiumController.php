<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PremiumModel;

class PremiumController extends Controller
{
    function dashboard()
    {
        
        return view('premium.dashboard');
    }
    function profile()
    {
        $user = User::where('email',session()->get('logged'))->first();
        return view('premium.profile')->with('user',$user);
        
        
    }
    function updateSubmit(Request $req)
    {
        
        @$this->validate($req,
                        [
                            "name"=>"required|max:20|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
                            "email"=>"required|regex:/^([1-9]{2}-[0-9]{5}-[1-3]{1})\@student\.aiub\.edu+$/",
                            
                            
                
                        ],
                        [
                            "name.required"=> "Please Enter Your Name",
                            "name.max"=> "Maximum 20 Characters",
                            "name.regex"=>"Please Enter A Valid Name",
                            "email.required"=>"Please Enter Your Email Address",
                            "email.regex"=>"Please Enter A Valid Email Address",
                            
                            
                        ]
                        );
        $user = User::where('email',session()->get('logged'))->first();  
        $name = $user->email.time().".".$req->file('pro_pic')->getClientOriginalExtension();
        $req->file('pro_pic')->move(public_path('pro_images'),$name);               
        $user->name = $req->name;
        $user->pro_pic = $name;
        $user->email = $req->email;
        
        $user->save();
        return redirect()->route('premium.profile');
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
            return redirect()->route('premium.profile');
        }
        else
        {
            session()->flash('msg','Password is incorrect');
            return back();
        }

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    function login()
    {
        return view('common.login');
    }
    function loginSubmit(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
        'email.required' => 'Email is required',
        'password.required' => 'Password is required',
        ]);

        $user = User::where('email', $req->email)->where('password',$req->password)
                         ->first();
        //$password = $req->input('password');
        if($req->email==$user->email && $req->password==$user->password)
        {
            if($user->type=='premium')
            {
                session()->put('logged', $user->email);
                return redirect()->route('premium.dashboard');
            }
            else if($user->type=='admin')
            {
                session()->put('logged', $user->email);
                return redirect()->route('admin.dashboard');
            }
            
        }
        else
        {
            session()->flash('msg','User not valid');
            return back();
            //return redirect()->route('common.login');
        }
        /* if($user!=null){
                            
            session()->put('logged',$user->user_id);
            return redirect()->route('premium.dashboard');
                
        }
        else {
            session()->flash('msg','User not valid');
            return back();
            } */
        
    }
    
        
    
    function register()
    {
        return view('common.register');
    }
    function regSubmit(Request $req)
    {
        @$this->validate($req,
                        [
                            "name"=>"required|max:20|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
                            "email"=>"required|regex:/^([1-9]{2}-[0-9]{5}-[1-3]{1})\@student\.aiub\.edu+$/",
                            "password"=>"required|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/",
                            "conf_password"=>"required|same:password",
                            "type"=>"required"
                
                        ],
                        [
                            "name.required"=> "Please Enter Your Name",
                            "name.max"=> "Maximum 20 Characters",
                            "name.regex"=>"Please Enter A Valid Name",
                            "email.required"=>"Please Enter Your Email Address",
                            "email.regex"=>"Please Enter A Valid Email Address",
                            "password.required"=>"Please Enter A Password",
                            "password.min"=>"Minimum 8 Characters",
                            "password.regex"=>"password must contain a special character, a number and an uppercase letter",
                            "conf_password.required"=>"Please Confirm Your Password",
                            "conf_password.same"=>"Passwords do not match",
                            "type.required"=>"Please Enter User Type"
                        ]
                        );
                        
                        $user = new \App\Models\User;
                        $user->name = $req->name;
                        $user->email = $req->email;
                        $user->password = $req->password;
                        $user->type = $req->type;
                        $user->save();




                        event(new Registered($user));
                        return view('auth.verify-email');
    }

}
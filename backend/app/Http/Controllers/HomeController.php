<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderModel;
use App\Models\TokenModel;
use Datetime;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    protected function redirectTo()
{
  if (Auth::user()->type == 'admin')
  {
    return redirect()->route('admin.dashboard');  // admin dashboard path
  } else {
    return back(); // member dashboard path
  }
}
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
        

        if($user)
        {
            if($user->type=='premium')
            {
                session()->put('logged', $user->email);
                $order = OrderModel::where('user_id',$user->user_id)->first();
                if($order)
                {
                    return redirect()->route('premium.dashboard');
                }
                else
                {
                    return view('exampleEasycheckout')->with('user',$user);
                }
                //return redirect()->route('premium.dashboard');
            }
            else if($user->type=='admin')
            {
                session()->put('logged', $user->email);
                session()->put('type', $user->type);

                return redirect()->route('admin.dashboard');
            }
            else if($user->type=='production')
            {
                session()->put('logged', $user->email);
                return redirect()->route('production.dashboard');
            }
            else if($user->type=='free')
            {
                session()->put('logged', $user->email);
                return redirect()->route('free.dashboard');
            }
            
        }
        else
        {
            session()->flash('msg','User not valid');
            return back();
            
        }
       
        
    }

    function loginAPI(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }

        $user = User::where('email', $req->email)->where('password',$req->password)
                         ->first();
        
        if($user)
        {
            if($user->type=='premium')
            {
                $token_key = Str::random(64);
                $token = new TokenModel;
                $token->user_id = $user->user_id;
                $token->token_key = $token_key;
                $token->created_at = new Datetime;
                $token->save();
                return response()->json(['success'=>'Login Successful','token_key'=>$token_key], 200);

            }
        }
        return response()->json(['error'=>'User not valid'], 422);


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
                            "email"=>"required|email",
                            "password"=>"required|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/",
                            "conf_password"=>"required|same:password",
                            "type"=>"required"
                
                        ],
                        [
                            "name.required"=> "Please Enter Your Name",
                            "name.max"=> "Maximum 20 Characters",
                            "name.email"=>"Please Enter A Valid Name",
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
    function logout(){
        session()->forget('logged');
        session()->flash('msg','Sucessfully Logged out');
        return redirect()->route('login');
    }

}
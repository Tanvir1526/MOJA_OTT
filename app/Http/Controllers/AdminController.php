<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderModel;

class AdminController extends Controller
{
    //__________view__________
    function dashboard()
    {
        return view('admin.dashboard');
    }

    function viewAllUsers()
    {
        $users = User::all();
        return view('admin.users.allUser', ['users' => $users]);
        
    }

    function viewAllPremiumUsers()
    {
        $users=User::where('type', 'premium')->get();
        return view('admin.users.PremiumUser', ['users' => $users]);
    }
    function viewAllProductionHouse()
    {
        $users=User::where('type', 'production')->get();
        return view('admin.users.ProductionHouse', ['users' => $users]);
    }
    function viewAlladmin()
    {
        $users=User::where('type', 'admin')->get();
        return view('admin.users.admin', ['users' => $users]);
    }
    function viewAllMovies()
    {
        return view('admin.viewAllMovies');
    }
    //__________Details__________
    function viewUserDetails($id)
    {
        $users = User::where('user_id', $id)->first();
        return view('admin.users.Details', ['users' => $users]);
    }
    function profile()
    {
        $user = User::where('email',session()->get('logged'))->first();
        return view('admin.profile')->with('user',$user);
    }
    function payment()
    {
        $user = User::where('user_id')->first();
        $order=OrderModel::where('user_id')->first();
        return view('admin.Users.paymentHistory')->with('user',$user);
    }



    //_____________edit______________
    function editUser($id)
    { $user = User::where('user_id',$id)->first();
        return view('admin.Users.editUser')->with('user',$user);
    }
   
    //_____________update______________
    function   editUserSubmit(request $request)
    {
        $user = User::where('user_id',$request->user_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('admin.users.all');
    }
    
   
    //_____________delete______________
    function deleteUser($id)
    {
        $users = User::where('user_id', $id)->first();
        // $users = User::where('email',session()->get('logged'))->first();
        // return view('admin.users.allUser')->with('users',$users);
        // $user = User::find($id);
        if($users->email == session()->has('logged'))
        {
            session()->flash('msg','User is logged in'); 
        }
        else
        {
            $users->delete();
            session()->flash('msg1','User Deleted'); 
        }
        $users->delete();

        return redirect()->back();
       
    }
 
    //_____________create______________
    function createUser()
    {
        return view('admin.users.createUser');
    } 
    //_____________createSubmit______________
    function createUserSubmit( Request $req)
    {
            $this->validate($req,
            [
                "name"=>"required|max:20|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
                "email"=>"required|email",
                "password"=>"required|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/",
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
                "type.required"=>"Please Enter User Type"
            ]
            );
            
            $user = new \App\Models\User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->type = $req->type;
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('admin.users.all');
    }
    //_____________Ban______________
    function banUser()
    {
        return view('admin.banUser');
    }
    function banProductionHouse()
    {
        return view('admin.banProductionHouse');
    }
    function banMovie()
    {
        return view('admin.banMovie');
    }
    //_____________Unban______________
    function unbanUser()
    {
        return view('admin.unbanUser');
    }
    function unbanProductionHouse()
    {
        return view('admin.unbanProductionHouse');
    }
    function unbanMovie()
    {
        return view('admin.unbanMovie');
    }
    
    


}

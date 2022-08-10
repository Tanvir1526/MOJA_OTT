<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderModel;
use App\Models\RatingModel;
use App\Models\ReportModel;
use App\Models\ContentModel;
use App\Models\ProductionModel;





class AdminController extends Controller
{
    //__________view__________
    function dashboard()
    {
        $userCount = User::count();
        $premiumUserCount = User::where('type', 'premium')->count();
        $productionUserCount = User::where('type', 'production')->count();
        $adminUserCount = User::where('type', 'admin')->count();
        $contentCount = ContentModel::count();
       
        //return view('admin.dashboard', compact('userCount', 'premiumUserCount', 'productionUserCount', 'adminUserCount', 'contentCount'));
        return response()->json($userCount, $premiumUserCount, $productionUserCount, $adminUserCount, $contentCount);
        // return view('admin.dashboard', compact('userCount'));

        // $users = User::All()->count();
        // return view('admin.dashboard')->with('users', $users);
       
    }

    function viewAllUsers()
    {
        $users = User::all();
        //return view('admin.users.allUser', ['users' => $users]);
        return response()->json($users);
    }

    function viewAllPremiumUsers()
    {
        $users=User::where('type', 'premium')->get();
        //return view('admin.users.PremiumUser', ['users' => $users]);
        return response()->json($users);
    }
    function viewAllProductionHouse()
    {
        $users=User::where('type', 'production')->get();
       // return view('admin.users.ProductionHouse', ['users' => $users]);
        return response()->json($users);
    }
    function viewAlladmin()
    {
        $users=User::where('type', 'admin')->get();
       // return view('admin.users.admin', ['users' => $users]);
        return response()->json($users);
    }
    function viewAllMovies()
    {
        $ContentModels = ContentModel::all();
       // return view('admin.content')->with('ContentModel',$ContentModels);
        return response()->json($ContentModels);
    }
    function viewReport()
    {
        $ReportModel = ReportModel::all();
        //return view('admin.report', ['ReportModel' => $ReportModel]);
        return response()->json($ReportModel);
    }
    function Statistics()
    {
        $userCount = User::count();
        $premiumUserCount = User::where('type', 'premium')->count();
        $productionUserCount = User::where('type', 'production')->count();
        $adminUserCount = User::where('type', 'admin')->count();
        $contentCount = ContentModel::count();
        $orderCount = OrderModel::count();
        $ratingCount = RatingModel::count();
        $reportCount = ReportModel::count();
        
        //return view('admin.statistics', compact('userCount', 'premiumUserCount', 'productionUserCount', 'adminUserCount', 'contentCount', 'orderCount', 'ratingCount', 'reportCount'));
        return response()->json($userCount, $premiumUserCount, $productionUserCount, $adminUserCount, $contentCount, $orderCount, $ratingCount, $reportCount);
    }


    //__________Details__________
    function viewUserDetails($id)
    {
        $users = User::where('user_id', $id)->first();
        //return view('admin.users.Details', ['users' => $users]);
        if ($users) {
            return response()->json($users);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }

    }
    function profile()
    {
        $user = User::where('email',session()->get('logged'))->first();
        //return view('admin.profile')->with('user',$user);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
    function payment()
    {
        $OrderModels = OrderModel::all();
        //return view('admin.Users.paymentHistory')->with('OrderModel',$OrderModels);
        return response()->json($OrderModels);
    }



    //_____________edit______________
    function editUser($id)
    { $user = User::where('user_id',$id)->first();
       //return view('admin.Users.editUser')->with('user',$user);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
   
    //_____________update______________
    function   editUserSubmit(Request $request)
    {
        $this->validate($request,
        [
            "name"=>"max:20|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
            "email"=>"email",
            "type"=>"required",
            "status"=>"required",
        ],
        [
            
            "name.max"=> "Maximum 20 Characters",
            "name.regex"=>"Please Enter A Valid Name",
            "email.email"=>"Please Enter A Valid Email Address",
            "type.required"=>"Please Select A Type",
            "status.required"=>"Please Select A Status"    
        ]
        );
        $user = User::where('user_id',$request->user_id)->first();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->status = $request->status;
        $user->save();
        //return redirect()->route('admin.users.all');
        return response()->json($user);
    }
    
   
    //_____________delete______________
    function deleteUser($id)
    {
        $users = User::where('user_id', $id)->first();
        // $users = User::where('email',session()->get('logged'))->first();
        // return view('admin.users.allUser')->with('users',$users);
        // $user = User::find($id);
        // if($users->email == session()->has('logged'))
        // {
        //     session()->flash('msg','User is logged in'); 
        // }
        // else
        // {
        //     $users->delete();
        //     session()->flash('msg1','User Deleted'); 
        // }
        // $users->delete();

        // return redirect()->back();
        if ($users) {
            $users->delete();
            return response()->json(['message' => 'User Deleted'], 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
       
    }

    function deleteContent($id)
    {
        $ContentModel = ContentModel::where('content_id', $id)->first();
        //$ContentModel->delete();
        //return redirect()->back();
        if ($ContentModel) {
            $ContentModel->delete();
            return response()->json(['message' => 'Content Deleted'], 200);
        } else {
            return response()->json(['error' => 'Content not found'], 404);
        }
    }


 
    //_____________create______________
    function createUser()
    {
        //return view('admin.users.createUser');
        return response()->json(['message' => 'User Created'], 200);
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
            //return redirect()->route('admin.users.all');
            return response()->json(['message' => 'User Created'], 200);
        }
    


}

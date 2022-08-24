<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PremiumModel;
use App\Models\ContentModel;
use App\Models\RatingModel;
use App\Models\ReportModel;
use App\Models\MyListModel;
use App\Models\OrderModel;
use App\Models\TokenModel;


class PremiumController extends Controller
{
    function dashboard()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $movielist = ContentModel::all();
        return view('premium.dashboard')->with('movielist',$movielist)->with('user',$user);
    }
    function dashboardAPI()
    {
        
        $movielist = ContentModel::all();
        return response()->json(['movielist'=>$movielist]);
    }
    function profile()
    {
        $user = User::where('email',session()->get('logged'))->first();
        return view('premium.profile')->with('user',$user);
        
        
    }
    function profileAPI()
    {
        $key = $req->token;
        if($key){
            $tk = Token::where("token_key",$key)->first();
        return response()->json(['user'=>$user]);
        }
        else{
            return response()->json(['error'=>'Token is not valid']);
        }
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
    function inside(Request $req)
    {
        $user = User::where('email',session()->get('logged'))->first();
        $content = ContentModel::where('content_id',$req->id)->first();
        $rating = RatingModel::where('content_id', $content->content_id)->first();
        return view('premium.inside')->with('content',$content)->with('user',$user)->with('rating',$rating);
    }
    function insideAPI(Request $req)
    {
        $content = ContentModel::where('content_id',$req->id)->first();
        $rating = RatingModel::where('content_id', $content->content_id)->first();
        return response()->json(['content'=>$content,'rating'=>$rating]);
    }
    function ratingSubmit(Request $req)
    {
        

        $content_id = $req->input('content_id');
        $user_id = $req->input('user_id');
        $user = User::where('email',session()->get('logged'))->first();
        
        
        $rating = RatingModel::where('user_id',$user_id)->where('content_id',$content_id)->first();
        if($rating == null){
        $rating = new RatingModel();
        $rating->user_id = $user->user_id;
        $rating->content_id = $req->content_id;
        $rating->rating = $req->rating;
        $rating->save();
        }
        else{
            
            session()->flash('msg','Already rated'); 
        }
        return redirect()->route('premium.inside',['id'=>$content_id]);
        //return view('premium.inside')->with('id',$req->content_id)->with('rating', $rating);
        //return view('premium.dashboard');
        
        
    }
    function ratingAPI(Request $req)
    {
        $content_id = $req->input('content_id');
        $user_id = $req->input('user_id');
        
        
        
        $rating = RatingModel::where('user_id',$user_id)->where('content_id',$content_id)->first();
        if($rating == null){
        $rating = new RatingModel();
        $rating->user_id = $user->user_id;
        $rating->content_id = $req->content_id;
        $rating->rating = $req->rating;
        $rating->save();
        }
        else{
            
            return response()->json(['msg'=>'Already rated']);
        }
        return response()->json(['rating'=>$rating]);
        //return view('premium.inside')->with('id',$req->content_id)->with('rating', $rating);
        //return view('premium.dashboard');
        
        
    }


    function reportSubmit(Request $req)
    {
        $content_id = $req->input('content_id');
        $user_id = $req->input('user_id');
        $user = User::where('email',session()->get('logged'))->first();
        
        
        $report = ReportModel::where('user_id',$user_id)->where('content_id',$content_id)->first();
        if($report == null){
        $report = new ReportModel();
        $report->user_id = $user->user_id;
        $report->content_id = $req->content_id;
        $report->message = $req->report;
        $report->save();
        }
        else{
            
            session()->flash('msg','Already reported'); 
        }
        return redirect()->route('premium.inside',['id'=>$content_id]);
       
    }
    function reportAPI(Request $req)
    {
        $content_id = $req->input('content_id');
        $user_id = $req->input('user_id');
        
        
        
        $report = ReportModel::where('user_id',$user_id)->where('content_id',$content_id)->first();
        if($report == null){
        $report = new ReportModel();
        $report->user_id = $user->user_id;
        $report->content_id = $req->content_id;
        $report->message = $req->report;
        $report->save();
        }
        else{
            
            return response()->json(['msg'=>'Already reported']);
        }
        return response()->json(['report'=>$report]);
        //return view('premium.inside')->with('id',$req->content_id)->with('rating', $rating);
        //return view('premium.dashboard');
        
        
    }

    function mylist()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $mylist = MyListModel::where('user_id',$user->user_id)->get();
        //return $mylist;
        
        return view('premium.mylist')->with('mylist',$mylist);
    }
    function mylistSubmit(Request $req)
    {
        $content_id = $req->input('content_id');
        $user_id = $req->input('user_id');
        $user = User::where('email',session()->get('logged'))->first();
        
        
        $mylist = MyListModel::where('user_id',$user_id)->where('content_id',$content_id)->first();
        if($mylist == null){
        $mylist = new MyListModel();
        $mylist->user_id = $user->user_id;
        $mylist->content_id = $req->content_id;
        $mylist->save();
        }
        else{
            
            session()->flash('msg3','Already added'); 
        }
        return redirect()->route('premium.inside',['id'=>$content_id]);
    }
    function searchSubmit(Request $req)
    {
        $user = User::where('email',session()->get('logged'))->first();
        $search = $req->input('search');
        $content = ContentModel::where('title','like','%'.$search.'%')->get();
        return view('premium.searchResult')->with('content',$content)->with('user',$user);
    }
    function payment()
    {
        $user = User::where('email',session()->get('logged'))->first();
        $order=OrderModel::where('user_id',$user->user_id)->first();
        return view('premium.paymentHistory')->with('order',$order);
    }
}

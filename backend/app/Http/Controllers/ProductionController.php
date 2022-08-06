<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContentModel;
use App\Models\PremiumModel;
use App\Models\ReportModel;
use App\Models\RatingModel;
use App\Models\OrderModel;

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
              
                'title'=>"required|max:50|regex:^[a-zA-Z\s\.\-]+$^",
                'description'=>"required|max:100|regex:^[a-zA-Z\s\.\-]+$^",
                'image'=>'required|mimes:php,pdf,docx,xlsx,xlx,jpg',
                'video'=>'required|mimes:mp4',
                'genre'=>"required|max:20|regex:^[a-zA-Z\s\.\-]+$^",
                'language'=>"required|max:30|regex:^[a-zA-Z\s\.\-]+$^",
                'country'=>"required|max:40|regex:^[a-zA-Z\s\.\-]+$^",
                'release_date'=>"required|date",
                'runtime'=>'required',
                'director'=>"required|max:50|regex:^[a-zA-Z\s\.\-]+$^",
                'cast'=>"required|max:100|regex:^[a-zA-Z\s\.\-]+$^",
                'user_id'=>'required'

        ],
        [
            "title.required"=> "Please provide the title name",
            "title.max"=> "Title should not exceed 50 characters",
            "description.required"=> "Please provide the proper description",
            "description.max"=> "Description should not exceed 100 characters",
            "genre.required"=> "Genre is not empty",
            "genre.max"=> "Genre should not exceed 20 characters",
            "language.required"=> "Please Provide valid language",
            "language.max"=> "language should not exceed 30 characters",
            "country.required"=> "Fill up the country name",
            "country.max"=> "Country should not exceed 30 characters",
            "release_date.date"=>"Release date must be fillup",
            "director.required"=> "Please provide the director name",
            "director.max"=> "Director should not exceed 50 characters",
            "cast.required"=> "Please enter the cast name",
            "cast.max"=> "cast should not exceed 1000 characters"
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
    }

    public function Edit($id)
    {
        //    $user = User::where('email',session()->get('logged'))->first();
            //  //  return view('production.contentedit');
        

            $ContentModel =ContentModel::where('content_id',$id)->first();
            return view('production.contentedit')->with('ContentModel',$ContentModel);
    }

    function contentupdateSubmit(Request $req)
     
    {
        $this->validate($req,
        [
              
                'title'=>"required|max:50|regex:^[a-zA-Z\s\.\-]+$^",
                'description'=>"required|max:100|regex:^[a-zA-Z\s\.\-]+$^",
                'image'=>'required|mimes:php,pdf,docx,xlsx,xlx,jpg',
                'video'=>'required|mimes:mp4',
                'genre'=>"required|max:20|regex:^[a-zA-Z\s\.\-]+$^",
                'language'=>"required|max:30|regex:^[a-zA-Z\s\.\-]+$^",
                'country'=>"required|max:40|regex:^[a-zA-Z\s\.\-]+$^",
                'release_date'=>"required|date",
                'runtime'=>'required',
                'director'=>"required|max:50|regex:^[a-zA-Z\s\.\-]+$^",
                'cast'=>"required|max:100|regex:^[a-zA-Z\s\.\-]+$^",
                'user_id'=>'required'

        ],
        [
            "title.required"=> "Please provide the title name",
            "title.max"=> "Title should not exceed 50 characters",
            "description.required"=> "Please provide the proper description",
            "description.max"=> "Description should not exceed 100 characters",
            "genre.required"=> "Genre is not empty",
            "genre.max"=> "Genre should not exceed 20 characters",
            "language.required"=> "Please Provide valid language",
            "language.max"=> "language should not exceed 30 characters",
            "country.required"=> "Fill up the country name",
            "country.max"=> "Country should not exceed 30 characters",
            "release_date.date"=>"Release date must be fillup",
            "director.required"=> "Please provide the director name",
            "director.max"=> "Director should not exceed 50 characters",
            "cast.required"=> "Please enter the cast name",
            "cast.max"=> "cast should not exceed 100 characters",
        ]
        );
       // return $req->file('image')->getClientOriginalName();
            
            $user = User::where('email',session()->get('logged'))->first();  
            $name = time().".".$req->file('image')->getClientOriginalName();
            $req->file('image')->move(public_path('pro_images'),$name);    
            $mname =time().".".$req->file('video')->getClientOriginalName();
            $req->file('video')->move(public_path('movies'),$mname);           
            $content = new ContentModel();
            $content->exists=true;
            $content->content_id=$req->content_id;
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
            return "Edit Successfull";
          //  return redirect()->route('list');
    }

    function profile()
    {
           $user = User::where('email',session()->get('logged'))->first();
           return view('production.profile')->with('user',$user);    
    }

    function profileupdateSubmit(Request $req)
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
            return "Profile Edit Successfull";
           // return redirect()->route('production.profile');
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
    function contentdelete(Request $req )
    {
       // return $req->content_id;
        $content = ContentModel::where('content_id',$req->content_id)->delete();
        return redirect()->route('contentlist');
        
    }
    function contentsearch(Request $req)
    {
        //return $req;
        $ContentModels = ContentModel::where('user_id',$req->SearchId)->get();
        return view('production.contentsearch')->with('ContentModel',$ContentModels);
    }

    function contentreport()
    {
        $ReportModels = ReportModel::all();
        return view('production.viewreports')->with('ReportModel',$ReportModels);
    }
    function contentrating()
    {
        $RatingModels = RatingModel::all();
        return view('production.ratingview')->with('RatingModel',$RatingModels);
    }
    function contentpaymenthistory()
    {
        $OrderModels = OrderModel::all();
        return view('production.paymenthistory')->with('OrderModel',$OrderModels);
    }
    function contentabout()
    {
        return view('production.contentabout');
    }
    function productioncontact()
    {
        return view('production.productioncontact');
    }

}


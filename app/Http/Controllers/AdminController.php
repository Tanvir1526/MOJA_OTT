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
        return view('admin.users.PremiumUser', ['users' => $users]);
    }
    function viewAlladmin()
    {
        $users=User::where('type', 'admin')->get();
        return view('admin.users.PremiumUser', ['users' => $users]);
    }
    function viewAllMovies()
    {
        return view('admin.viewAllMovies');
    }
    function viewAllGenres()
    {
        return view('admin.viewAllGenres');
    }
    //__________Details__________
    function viewUserDetails($id)
    {
        $users = User::where('user_id', $id)->first();
        return view('admin.users.Details', ['users' => $users]);
    }
    function payment()
    {
        $user = User::where('user_id')->first();
        $order=OrderModel::where('user_id')->first();
        return view('admin.Users.paymentHistory')->with('user',$user);
    }



    //_____________edit______________
    function editUser()
    {
        return view('admin.editUser');
    }
    function editPremiumUser()
    {
        return view('admin.editPremiumUser');
    }
    function editProductionHouse()
    {
        return view('admin.editProductionHouse');
    }
    function editMovie()
    {
        return view('admin.editMovie');
    }
    function editGenre()
    {
        return view('admin.editGenre');
    }
    //_____________update______________
    function   editUserSubmit()
    {
        return view('admin.editUserSubmit');
    }
    function editPremiumUserSubmit()
    {
        return view('admin.editPremiumUserSubmit');
    }
    function editProductionHouseSubmit()
    {
        return view('admin.editProductionHouseSubmit');
    }
    function editMovieSubmit()
    {
        return view('admin.editMovieSubmit');
    }
    function editGenreSubmit()
    {
        return view('admin.editGenreSubmit');
    }
    //_____________delete______________
    function deleteUser()
    {
        return view('admin.deleteUser');
    }
    function deletePremiumUser()
    {
        return view('admin.deletePremiumUser');
    }
    function deleteProductionHouse()
    {
        return view('admin.deleteProductionHouse');
    }
    function deleteMovie()
    {
        return view('admin.deleteMovie');
    }
    function deleteGenre()
    {
        return view('admin.deleteGenre');
    }
    //_____________create______________
    function createAdmin()
    {
        return view('admin.createUser');
    }
    function createProductionHouse()
    {
        return view('admin.createUser');
    }
    function createGenre()
    {
        return view('admin.createGenre');
    }
    //_____________createSubmit______________
    function createAdminSubmit()
    {
        return view('admin.createAdminSubmit');
    }
    function createProductionHouseSubmit()
    {
        return view('admin.createProductionHouseSubmit');
    }
    function createGenreSubmit()
    {
        return view('admin.createGenreSubmit');
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

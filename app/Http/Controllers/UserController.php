<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    //
    public function index()
    {   
        $user = Auth::user();
        return view('profile.index',compact('user'));
    }
}

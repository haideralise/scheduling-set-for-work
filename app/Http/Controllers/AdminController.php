<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        $users = User::count();
        return view('admin.admin.index',compact('users'));
    }
}

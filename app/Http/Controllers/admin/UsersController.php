<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public static function index()
    {
        $users = User::all();
        return view('admin.users.users-list',compact(['users']));
    }
}

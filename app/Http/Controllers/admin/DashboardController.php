<?php

namespace App\Http\Controllers\admin;

use App\episodes;
use App\series;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|editor');
    }
    public function index()
    {
        $users = User::all()->count();
        $episodes = episodes::all()->count();
        $series = series::all()->count();
        return view('admin.dashboard',compact(['users','episodes','series']));
    }
}

<?php

namespace App\Http\Controllers;

use App\episodes;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function index()
    {
       $episodes =  episodes::orderBy('created_at', 'desc')->paginate(25);
       return view('welcome')
           ->with('episodes',$episodes);
    }
}

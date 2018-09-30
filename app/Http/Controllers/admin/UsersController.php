<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('role:editor')->only(['index']);
    }
    protected function validateUsers()
    {
        return $this->validate(Request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2000'
        ]);
    }

    public  function index()
    {
        $users = User::all();
        return view('admin.users.users-list',compact(['users']));
    }

    public  function create()
    {
        $roles = Role::all();

        return view('admin.users.users-create',compact(['roles']));
    }
    public  function store(request $request)
    {
        $this->validateUsers();

        User::store($request->all());

        return Redirect::route('users.index')->with('success_alert','User was added successfully');

    }

    public function edit($userID)
    {
        $user = User::find($userID);

        return view('admin.users.users-edit',compact(['user']));
    }

    public function update(request $request,$userID)
    {
        $this->validateUsers();

        User::edit($request->all(),$userID);

        return Redirect::route('users.index')->with('warning_alert','User was updated successfully');


    }
    public function show($userID)
    {
        $user = User::find($userID);

        $role = Role::getRoleOfUser($userID);

        return view('admin.users.users-details',compact(['user','role']));
    }

    public function destroy($userID)
    {
        User::deleteUser($userID);

        return Redirect::route('users.index')->with('danger_alert','User was deleted successfully');
    }
}

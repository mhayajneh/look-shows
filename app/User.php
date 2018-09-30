<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    public static function store($request)
    {
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->image = self::storeFiles('image');
        $user->save();
        Role::giveRole($user->id,$request['role']);

    }

    public static function edit($request,$userID)
    {
        $user = User::find($userID);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->image = self::storeFiles('image');
        $user->save();
    }


    public static function deleteUser($userID)
    {
        $user = User::find($userID);
        if ($user != null)
            $user->delete();
    }


    public static function storeFiles($fileName)
    {
        $request = request();
        //The request function returns the current request instance or obtains an input item.
        $file = $request->file($fileName);
        $fileSaveAsName = time() . Auth::id() . "." .
            $file->getClientOriginalExtension();
        $upload_path = 'uploads/';
        $file_url = $upload_path . $fileSaveAsName;
        $file->move($upload_path, $fileSaveAsName);
        return $file_url;
    }
}

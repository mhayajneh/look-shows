<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
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

    public static function storeImage()
    {
        $request = request();
        //The request function returns the current request instance or obtains an input item.
        $profileImage = $request->file('image');
        $profileImageSaveAsName = time() . Auth::id() . "-profile." .
            $profileImage->getClientOriginalExtension();
        $upload_path = 'profile_images/';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $profileImage->move($upload_path, $profileImageSaveAsName);
        return $profile_image_url;
    }
}

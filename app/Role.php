<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public static function giveRole($userID, $roleID)
    {
        DB::table('role_user')->insert([
            'user_id' => $userID,
            'role_id' => $roleID,

        ]);
    }
    public static function getRoleOfUser($userID)
    {
        $roleID = DB::table('role_user')->where('user_id',$userID)->first()->role_id;
        return Role::find($roleID)->name;
    }
}

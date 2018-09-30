<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $table = 'role';
    protected $fillable = ['name','display_name','description'];
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public static function giveRole($userID, $roleID)
    {
        DB::table('role_user')->insert([
            'user_id' => $userID,
            'role_id' => $roleID,
            'user_type'=> 1,

        ]);
    }
    public static function getRoleOfUser($userID)
    {
        $roleID = DB::table('role_user')->where('user_id',$userID)->first()->role_id;
        return Role::find($roleID)->name;
    }
}

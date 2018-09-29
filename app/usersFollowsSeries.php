<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class usersFollowsSeries extends Model
{
    protected $table= 'users_follows_series';
    protected $fillable = ['users_id','series_seriesID'];

    public static function seriesIsFollowed($seriesID)
    {
        $userSeriesFollow = usersFollowsSeries::where('series_seriesID',$seriesID)->where('users_id',Auth::id())->first();
        if ($userSeriesFollow != null)
            return true;
        else
            return false;
    }
}

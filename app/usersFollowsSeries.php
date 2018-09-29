<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class usersFollowsSeries extends Model
{
    protected $table= 'users_follows_series';
    protected $fillable = ['users_id','series_seriesID'];

    public static function storeSeriesFollow($seriesID)
    {
        $usersFollowSeries = new usersFollowsSeries;
        $usersFollowSeries->users_id = Auth::id();
        $usersFollowSeries->series_seriesID = $seriesID;
        $usersFollowSeries->save();
    }
    public static function unFollowSeries($seriesID)
    {
        $userSeriesFollow = usersFollowsSeries::where('series_seriesID',$seriesID)->where('users_id',Auth::id())->first();
        if ($userSeriesFollow != null)
            $userSeriesFollow->delete();
    }
    public static function seriesIsFollowed($seriesID)
    {
        $userSeriesFollow = usersFollowsSeries::where('series_seriesID',$seriesID)->where('users_id',Auth::id())->first();
        if ($userSeriesFollow != null)
            return true;
        else
            return false;
    }
    public static function followSeries($seriesID)
    {
        if (!self::seriesIsFollowed($seriesID))
            self::storeSeriesFollow($seriesID);
        else
            self::unFollowSeries($seriesID);
    }

}

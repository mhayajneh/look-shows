<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class episodes extends Model
{
    protected $table = 'episodes';
    protected $fillable = ['title','description','thumbnail','video','series_seriesID'];
    protected $primaryKey = 'episodeID';


    public static function getSeriesEpisodes($seriesID)
    {
        $series = series::find($seriesID);

        return [
            'series' => $series,
            'episodes' =>$series->episodes,
            'isSeriesFollowed'=> usersFollowsSeries::seriesIsFollowed($seriesID)
        ];

    }

    public static function searchForEpisodes($request)
    {
        $episode = episodes::where('title',$request['search'])->first();
        if ($episode != null)
            return true;
        else
            return false;
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class episodes extends Model
{
    protected $table = 'episodes';
    protected $fillable = ['title','description','thumbnail','video','series_seriesID'];
    protected $primaryKey = 'episodeID';





    public static function storeEpisode($request)
    {
        $episode = new episodes;
        $episode->title = $request['title'];
        $episode->description = $request['description'];
        $episode->thumbnail = User::storeFiles('thumbnail');
        $episode->video = User::storeFiles('video');
        $episode->series_seriesID = $request['series_seriesID'];
        $episode->save();
    }

    public static function editEpisode($request,$episodeID)
    {
        $episode = episodes::find($episodeID);
        $episode->title = $request['title'];
        $episode->description = $request['description'];
        if (request()->hasFile('thumbnail'))
            $episode->thumbnail = User::storeFiles('thumbnail');
        if (request()->hasFile('video'))
            $episode->video = User::storeFiles('video');
        $episode->series_seriesID = $request['series_seriesID'];
        $episode->save();
    }

    public static function deleteEpisode($episodeID)
    {
        $episode = episodes::find($episodeID);
        if ($episode != null)
            $episode->delete();
    }



    public static function getSeriesEpisodes($seriesID)
    {
        $series = series::find($seriesID);

        return [
            'series' => $series,
            'episodes' =>$series->episodes->paginate(35),
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

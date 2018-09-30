<?php

namespace App\Http\Controllers;

use App\episodes;
use App\series;
use App\usersFollowsSeries;
use App\usersLikesEpisodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EpisodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['episodeDetails','episodeLike','seriesFollow']);
        $this->middleware('role:user')->only(['episodeDetails','episodeLike','seriesFollow']);
    }

    public function seriesEpisodesList($seriesID)
    {
        $episodes = episodes::getSeriesEpisodes($seriesID);
        return view('library.episodes-list',compact(['episodes']));
    }

    public function episodeDetails($seriesID,$episodeID)
    {
        $episode = episodes::find($episodeID);
        $episode['isLiked'] = usersLikesEpisodes::episodeIsLiked($episodeID);
        $series = series::find($seriesID);
        return view('library.episode-details',compact(['episode','series']));
    }

    public function episodeLike($episodeID)
    {
        usersLikesEpisodes::likeEpisode($episodeID);
        return Redirect::back();
    }

    public function seriesFollow($seriesID)
    {
        usersFollowsSeries::followSeries($seriesID);
        return Redirect::back();
    }
    public function search(request $request)
    {
        if (series::searchForSeries($request->all())) {
            $series = series::where('title', $request['search'])->first();
            return Redirect::route('series', $series->seriesID);
        }
        elseif(episodes::searchForEpisodes($request->all())){
            $episode = episodes::where('title',$request['search'])->first();
            return Redirect::route('episodeDetails',array($episode->series_seriesID,$episode->episodeID));

        }else
        {
            return Redirect::back()->with('alert_warning','There\'s no such series or episode');
        }

    }
}

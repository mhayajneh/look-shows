<?php

namespace App\Http\Controllers;

use App\episodes;
use App\series;
use App\usersLikesEpisodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EpisodesController extends Controller
{
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
}

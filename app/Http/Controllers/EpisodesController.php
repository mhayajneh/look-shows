<?php

namespace App\Http\Controllers;

use App\episodes;
use App\series;
use Illuminate\Http\Request;

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
        $series = series::find($seriesID);

        return view('library.episode-details',compact(['episode','series']));
    }
}

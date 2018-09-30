<?php

namespace App\Http\Controllers\admin;

use App\episodes;
use App\series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class EpisodesController extends Controller
{
    protected function validateEpisodes()
    {
        return $this->validate(Request(),[
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'series_seriesID' => 'required|numeric',
            'thumbnail' => 'required|max:150',
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
        ]);
    }
    public function index()
    {
        $episodes = episodes::all();

        return view('admin.episodes.episode-list',compact(['episodes']));
    }

    public function create()
    {
        $series = series::all();

        return view('admin.episodes.episode-create',compact(['series']));
    }
    public function store(request $request)
    {
        $this->validateEpisodes();

        episodes::storeEpisode($request->all());

        return Redirect::route('episodes.index')->with('success_alert','Episode was added successfully');
    }

    public function edit($episodeID)
    {
        $series = series::all();
        $episode = episodes::find($episodeID);

        return view('admin.episodes.episode-edit',compact(['series','episode']));
    }
    public function update(request $request, $episodeID)
    {
        $this->validateEpisodes();

        episodes::editEpisode($request->all(),$episodeID);

        return Redirect::route('episodes.index')->with('warning_alert','Series was updated successfully');
    }

    public function show($episodeID)
    {
        $episode = episodes::find($episodeID);

        return view('admin.episodes.episode-details',compact(['episode']));
    }

    public function delete($episodeID)
    {
        episodes::deleteEpisode($episodeID);
        return Redirect::route('episodes.index')->with('danger_alert','Series was deleted successfully');
    }

}

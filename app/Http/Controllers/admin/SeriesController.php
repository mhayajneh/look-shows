<?php

namespace App\Http\Controllers\admin;

use App\series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SeriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|editor');
    }
    protected function validateSeries()
    {
        return $this->validate(Request(),[
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'showTime' => 'required|max:150'
        ]);
    }

    public function index()
    {
        $series = series::all();
        return view('admin.series.series-list',compact(['series']));
    }

    public function create()
    {
        return view('admin.series.series-create');
    }

    public function store(request $request)
    {
        $this->validateSeries();
        series::storeSeries($request->all());
        return Redirect::route('series.index')->with('success_alert','Series was added successfully');
    }

    public function edit($seriesID)
    {
        $series = series::find($seriesID);
        return view('admin.series.series-edit',compact(['series']));
    }

    public function update(request $request,$seriesID)
    {
        $this->validateSeries();
        series::editSeries($request,$seriesID);
        return Redirect::route('series.index')->with('warning_alert','Series was updated successfully');
    }

    public function show($seriesID)
    {
        $series = series::find($seriesID);
        return view('admin.series.series-details',compact(['series']));
    }

    public function destroy($seriesID)
    {
        series::deleteSeries($seriesID);
        return Redirect::route('series.index')->with('danger_alert','Series was deleted successfully');
    }
}

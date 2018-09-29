<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class series extends Model
{
    protected $table ='series';
    protected $fillable = ['title','description','showTime'];
    protected $primaryKey = 'seriesID';

    public function episodes()
    {
        return $this->hasMany('App\episodes');
    }

    public static function storeSeries($request)
    {
        $series = new series;
        $series->title = $request['title'];
        $series->description = $request['description'];
        $series->showTime = $request['showTime'];
        $series->save();
        return $series;
        // returning series because why not
    }

    public static function editSeries($request,$seriesID)
    {
        $series = series::find($seriesID);
        $series->title = $request['title'];
        $series->description = $request['description'];
        $series->showTime = $request['showTime'];
        $series->save();

    }

    public static function deleteSeries($seriesID)
    {
        $series = series::find($seriesID);
        if ($series != null)
            $series->delete();
    }

    public static function searchForSeries($request)
    {
        $series = series::where('title',$request['search'])->first();
        if ($series != null)
            return true;
        else
            return false;
    }
}

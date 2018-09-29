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

    public static function searchForSeries($request)
    {
        $series = series::where('title',$request['search'])->first();
        if ($series != null)
            return true;
        else
            return false;
    }
}

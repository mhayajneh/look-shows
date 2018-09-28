<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class episodes extends Model
{
    protected $table = 'episodes';
    protected $fillable = ['title','description','thumbnail','video','series_seriesID'];
    protected $primaryKey = 'episodeID';


}

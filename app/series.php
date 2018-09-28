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
}

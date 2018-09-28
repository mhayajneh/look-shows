<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersFollowsSeries extends Model
{
    protected $table= 'users_follows_series';
    protected $fillable = ['users_id','series_seriesID'];
}

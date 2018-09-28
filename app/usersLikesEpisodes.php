<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersLikesEpisodes extends Model
{
    protected $table= 'users_likes_episodes';
    protected $fillable = ['users_id','episodes_episodeID'];
}

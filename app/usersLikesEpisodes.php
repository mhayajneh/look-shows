<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class usersLikesEpisodes extends Model
{
    protected $table= 'users_likes_episodes';
    protected $fillable = ['users_id','episodes_episodeID'];

    public static function storeEpisodeLike($episodeID)
    {
        $usersLikesEpisode = new usersLikesEpisodes;
        $usersLikesEpisode->users_id = Auth::id();
        $usersLikesEpisode->episodes_episodeID = $episodeID;
        $usersLikesEpisode->save();
    }

    public static function unLikeEpisode($episodeID)
    {
        $userLikesEpisodes = usersLikesEpisodes::where('episodes_episodeID',$episodeID)->where('users_id',Auth::id())->first();
        if ($userLikesEpisodes != null)
            $userLikesEpisodes->delete();

    }

    public static function episodeIsLiked($episodeID)
    {
        $userLikesEpisodes = usersLikesEpisodes::where('episodes_episodeID',$episodeID)->where('users_id',Auth::id())->first();

        if ($userLikesEpisodes != null)
            return true;
        else
            return false;
    }

    public static function likeEpisode($episodeID)
    {
        if (!self::episodeIsLiked($episodeID))
            self::storeEpisodeLike($episodeID);
        else
            self::unLikeEpisode($episodeID);

    }
}

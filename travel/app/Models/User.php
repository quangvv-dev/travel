<?php

namespace App;

use App\Models\UserRank;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $guarded = ['id'];

    /**
     * Cut string data name
     *
     * @param $name
     *
     * @return mixed
     */
    public function getListTourIdAttribute($list_tour_id)
    {
        $list_tour_id = json_decode($list_tour_id, true);
        return $list_tour_id;
    }

    /**
     * Cut string data name
     *
     * @param $name
     *
     * @return mixed
     */
    public function getListViewVideoAttribute($list_view_video)
    {
        $list_view_video = json_decode($list_view_video, true);
        return $list_view_video;
    }

    public function userRank()
    {
        return $this->hasOne(UserRank::class, 'user_id', 'id');
    }
}

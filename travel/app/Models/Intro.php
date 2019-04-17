<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Intro extends Authenticatable
{
    use Notifiable;
    protected $table = 'app_intro_image';
    protected $guarded = ['id'];

//    /**
//     * Cut string data name
//     *
//     * @param $name
//     *
//     * @return mixed
//     */
//    public function getImagesAttribute($images)
//    {
//        return $images;
//    }
}

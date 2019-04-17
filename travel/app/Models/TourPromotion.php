<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class TourPromotion extends Authenticatable
{
    use Notifiable;
    protected $table = 'tour_promotion';
    protected $guarded = ['id'];

    public function getPersonRankAttribute($person_rank)
    {
        $person_rank = json_decode($person_rank, true);
        return $person_rank;
    }
}

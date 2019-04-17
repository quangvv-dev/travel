<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class SearchKeyword extends Authenticatable
{
    use Notifiable;
    protected $table = 'search_keyword';
    protected $guarded = ['id'];

    public function tourLocation()
    {
        return $this->belongsTo(TourLocation::class, 'tour_location_id', 'id');
    }
}

<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TourLocationRating extends Model
{
    protected $table = 'tour_location_rating';
    protected $guarded = ['id'];

    public function tourLocation()
    {
        return $this->belongsTo('App\Models\TourLocation', 'location_id', 'id');
    }

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour', 'location_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

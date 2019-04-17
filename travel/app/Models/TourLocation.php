<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class TourLocation extends Authenticatable
{
    use Notifiable;
    protected $table = 'tour_locations';
    protected $guarded = ['id'];

    /**
     * one vs one relationship with taxonomy
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class, 'city_id');
    }

    public function tour()
    {
        return $this->hasMany(Tour::class, 'tour_location_id', 'id');
    }
}

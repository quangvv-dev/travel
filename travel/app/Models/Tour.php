<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Tour extends Authenticatable
{
    use Notifiable;
    protected $table = 'tours';
    protected $guarded = ['id'];

    public function packageDefault()
    {
        return $this->belongsTo(TourPackage::class, 'default_package', 'id');
    }
}

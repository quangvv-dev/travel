<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class CategoryTour extends Authenticatable
{
    use Notifiable;
    protected $table = 'category_tour';
    protected $guarded = ['id'];

    public function tours()
    {
        return $this->hasMany('App\Models\Tour', 'category_id', 'id');
    }
}

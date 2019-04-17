<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRank extends Model
{
    protected $table = 'user_rank';
    protected $guarded = ['id'];

    public function rank()
    {
        return $this->belongsTo('App\Models\Rank', 'rank_id', 'id');
    }
}

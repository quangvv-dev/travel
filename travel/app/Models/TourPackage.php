<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $table = 'tour_package';
    protected $guarded = ['id'];

    public function getTimeAttribute()
    {
        $time = $this->time_start;
        $time = str_replace('[', '', $time);
        $time = str_replace(']', '', $time);
        $time = str_replace('"', '', $time);
        return $time;
    }
}

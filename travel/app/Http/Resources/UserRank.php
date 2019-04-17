<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserRank extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'member_point' => $this->member_point,
            'rank' => [
                'id' => @$this->rank->id,
                getLang('rank_name') => @(getLang('rank_name', $this->rank)),
                'point_level' => @$this->rank->point_level,
                'discount_max' => @$this->rank->discount_max,
                'icon' => @$this->rank->icon,
            ],

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Rank extends JsonResource
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
            getLang('rank_name') => getLang('rank_name', $this),
            'point_level' => $this->point_level,
            'discount_max' => $this->discount_max,
            'icon' => $this->icon,

        ];
    }
}

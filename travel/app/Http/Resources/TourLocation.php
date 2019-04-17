<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TourLocation extends JsonResource
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
            getLang('name') => getLang('name', $this),
            getLang('description') => getLang('description', $this),
            'lat_long' => $this->lat_long,
            'time_zone' => $this->time_zone,
            getLang('best_time') => getLang('best_time', $this),
            'currency_id' => $this->currency_id,
            'city_id' => $this->city_id,
            'avg_star_rating' => $this->avg_star_rating,
            'image' => $this->image,
            'address' => $this->address,
            'highlights' => $this->highlights,
            'view' => $this->view,


        ];
    }
}

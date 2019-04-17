<?php

namespace App\Http\Resources;

use App\Http\Resources\Tour as TourResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryTour extends JsonResource
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
            getLang('slogan') => getLang('slogan', $this),
            getLang('descript') => getLang('descript', $this),
            'tours' => TourResource::collection($this->tours),

        ];
    }
}

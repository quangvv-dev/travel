<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tour extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        
        return [
            'id'                          => $this->id,
            getLang('tour_name')          => getLang('tour_name', $this),
            'video_id'                    => $this->video_id,
            'booked_number'               => $this->booked_number,
            'cancel_time'                 => $this->cancel_time,
            getLang('tour_description')   => getLang('tour_description', $this),
            'time_start'                  => $this->time_start,
            'time_end'                    => $this->time_end,
            'repeat_time'                 => $this->repeat_time,
            'category_id'                 => $this->category_id,
            getLang('experience_content') => getLang('experience_content', $this),
            getLang('tour_services')      => getLang('tour_services', $this),
            getLang('additional_info')    => getLang('additional_info', $this),
            getLang('tour_guide')         => getLang('tour_guide', $this),
            getLang('faq')                => getLang('faq', $this),
            getLang('cancel_policy')      => getLang('cancel_policy', $this),
            'lat_long_place'              => $this->lat_long_place,
            'tour_location_id'            => $this->tour_location_id,
            'address'                     => $this->address,
            'images'                      => $this->images,


        ];
    }
}

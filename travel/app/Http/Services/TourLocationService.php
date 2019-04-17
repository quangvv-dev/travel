<?php

namespace App\Http\Services;

use App\Helpers\ResponseUtil;
use App\Models\TourLocation;
use File;

class TourLocationService
{

    /**
     * Add TourLocation
     *
     * @param $request
     */
    public static function createLocation($request)
    {
        if ($request->hasFile('image_file')) {
            $image = ResponseUtil::upload($request->file('image_file'), 'location');
        }
        $rank = TourLocation::create([
            'name_en' => $request->name_en,
            'name_vi' => $request->name_vi,
            'name_th' => $request->name_th,
            'time_zone' => $request->time_zone,
            'city_id' => $request->city_id,
            'view' => 0,
            'avg_star_rating' => 5,
            'highlights' => $request->highlights ? $request->highlights : 0,
            'description_en' => $request->description_en ? $request->description_en : null,
            'description_vi' => $request->description_vi ? $request->description_vi : null,
            'description_th' => $request->description_th ? $request->description_th : null,
            'lat_long' => $request->lat_rcm && $request->lng_rcm ? $request->lat_rcm . '-' . $request->lng_rcm : '',
            'address' => $request->search_name ? $request->search_name : '',
            'best_time_en' => $request->best_time_en ? $request->best_time_en : null,
            'best_time_vi' => $request->best_time_vi ? $request->best_time_vi : null,
            'best_time_th' => $request->best_time_th ? $request->best_time_th : null,
            'image' => isset($image) ? $image : '',

        ]);
    }

    /**
     * Update TourLocation
     *
     * @param $request
     * @param $tourLocation
     */
    public static function updateLocation($request, $tourLocation)
    {

        $data = [
            'name_en' => $request->name_en,
            'name_vi' => $request->name_vi,
            'name_th' => $request->name_th,
            'time_zone' => $request->time_zone,
            'city_id' => $request->city_id,
            'highlights' => $request->highlights ? $request->highlights : 0,
            'description_en' => $request->description_en ? $request->description_en : null,
            'description_vi' => $request->description_vi ? $request->description_vi : null,
            'description_th' => $request->description_th ? $request->description_th : null,
            'lat_long' => $request->lat_rcm && $request->lng_rcm ? $request->lat_rcm . '-' . $request->lng_rcm : '',
            'address' => $request->search_name ? $request->search_name : '',
            'best_time_en' => $request->best_time_en ? $request->best_time_en : null,
            'best_time_vi' => $request->best_time_vi ? $request->best_time_vi : null,
            'best_time_th' => $request->best_time_th ? $request->best_time_th : null,
        ];

        if ($request->hasFile('image_file')) {
            $image = ResponseUtil::upload($request->file('image_file'), 'location');
            $data['image'] = isset($image) && $image ? $image : null;
        }
        $tourLocation->update($data);
    }

    /**
     * Destroy tourLocation
     *
     * @param $tourLocation
     */
    public static function destroyLocation($request, $tourLocation)
    {
        File::delete('uploads/location/' . $tourLocation->image);
        $tourLocation->delete();
    }
}

<?php

namespace App\Http\Services;

use App\Constants\ConstCodeApi;
use App\Models\TourLocationRating;
use File;

class TourLocationRatingService
{
    /**
     * Add tour location rating
     *
     * @param $request
     */
    public static function create($request, $id)
    {
        if ($request->location_id) {
            TourLocationRating::create([
                'location_id' => $request->location_id,
                'star_rating' => $request->star_rating,
                'comment'     => $request->comment,
                'user_id'     => $id,
                'type'        => ConstCodeApi::TYPE_RATTING_TOUR_LOCATION,
            ]);
        } elseif ($request->tour_id) {
            TourLocationRating::create([
                'location_id' => $request->tour_id,
                'star_rating' => $request->star_rating,
                'comment'     => $request->comment,
                'user_id'     => $id,
                'type'        => ConstCodeApi::TYPE_RATTING_TOUR,
            ]);
        } else {
            TourLocationRating::create([
                'location_id' => ConstCodeApi::RATING_APP,
                'star_rating' => $request->star_rating,
                'comment'     => $request->comment,
                'user_id'     => $id,
                'type'        => ConstCodeApi::TYPE_RATTING_APP,
            ]);
        }
    }
}

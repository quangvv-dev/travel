<?php

namespace App\Http\Controllers\API;

use App\Constants\ConstCodeApi;
use App\Constants\ResponseStatusCode;
use App\Http\Services\TourLocationRatingService;
use App\Models\Tour;
use App\Models\TourLocation;
use App\Models\TourLocationRating;
use Illuminate\Http\Request;

class TourLocationRatingController extends BaseApiController
{
    public function __construct(TourLocationRatingService $tourLocationRatingService)
    {
        $this->serve = $tourLocationRatingService;
    }

    /**
     * ratting tourlocation.
     *
     * @param  $request
     *
     * @return json
     */
    public function rating(Request $request)
    {
        $validate = [
            'location_id' => 'required',
            'comment'     => 'required',
            'star_rating' => 'required',
        ];
        $this->validator($request, $validate);
        $sum = 0;

        if (empty($this->error)) {
            $ratting_old = TourLocationRating::where('type', ConstCodeApi::TYPE_RATTING_TOUR_LOCATION)
                ->where('location_id', $request->location_id)
                ->where('user_id', $request->jwtUser->id)->first();
            if ($ratting_old) {
                return $this->jsonApi(
                    ResponseStatusCode::PAYMENT_REQUIRED,
                    __('flash.you_ratting')
                );
            }
            if (TourLocation::find($request->location_id)) {
                $this->serve->create($request, $request->jwtUser->id);
            } else {
                return $this->jsonApi(
                    ResponseStatusCode::PAYMENT_REQUIRED,
                    __('flash.not_exit_location')
                );
            }

            $start = TourLocationRating::where('type', ConstCodeApi::TYPE_RATTING_TOUR_LOCATION)
                ->where('location_id', $request->location_id)
                ->get()->map(function ($item) use (&$sum) {
                    $sum += $item->star_rating;
                });
            if (count($start)) {
                $count = count($start);
                $rating = round($sum / $count, 2, 0);
                $tour_location = TourLocation::find($request->location_id);
                $tour_location = $tour_location->update(['avg_star_rating' => $rating]);
                return $this->jsonApi(
                    ResponseStatusCode::OK,
                    __('flash.rating_thanh_cong')
                );
            } else {
                TourLocation::find($request->location_id)->update(['avg_star_rating' => $request->star_rating]);
            }
            return $this->jsonApi(ResponseStatusCode::OK, __('flash.rating_thanh_cong'));
        } else {
            return $this->jsonApi(ResponseStatusCode::BAD_REQUEST, $this->error);
        }
    }

    /**
     * ratting tour.
     *
     * @param  $request
     *
     * @return json
     */
    public function rattingTour(Request $request)
    {
        $validate = [
            'tour_id'     => 'required',
            'comment'     => 'required',
            'star_rating' => 'required',
        ];
        $this->validator($request, $validate);
        $sum = 0;

        if (empty($this->error)) {
            $ratting_old = TourLocationRating::where('type', ConstCodeApi::TYPE_RATTING_TOUR)
                ->where('location_id', $request->tour_id)
                ->where('user_id', $request->jwtUser->id)->first();
            if ($ratting_old) {
                return $this->jsonApi(
                    ResponseStatusCode::PAYMENT_REQUIRED,
                    __('flash.you_ratting')
                );
            }
            if (Tour::find($request->tour_id)) {
                $this->serve->create($request, $request->jwtUser->id);
            } else {
                return $this->jsonApi(
                    ResponseStatusCode::PAYMENT_REQUIRED,
                    __('flash.not_exit_tour')
                );
            }
            $start = TourLocationRating::where('type', ConstCodeApi::TYPE_RATTING_TOUR)
                ->where('location_id', $request->tour_id)
                ->get()->map(function ($item) use (&$sum) {
                    $sum += $item->star_rating;
                });
            if ($start) {
                $count = count($start);
                $rating = round($sum / $count, 2, 0);
                Tour::find($request->tour_id)->update(['avg_star_rating' => $rating]);
            } else {
                Tour::find($request->tour_id)->update(['avg_star_rating' => $request->star_rating]);
            }
            return $this->jsonApi(
                ResponseStatusCode::OK,
                __('flash.rating_thanh_cong')
            );
        } else {
            return $this->jsonApi(
                ResponseStatusCode::BAD_REQUEST,
                $this->error
            );
        }
    }
}

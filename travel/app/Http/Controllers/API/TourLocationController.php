<?php

namespace App\Http\Controllers\API;

use App\Constants\ConstCodeApi;
use App\Constants\ResponseStatusCode;
use App\Http\Resources\TourLocation as TourLocationResource;
use App\Http\Resources\TourLocationRating as TourLocationRatingResource;
use App\Models\Tour;
use App\Models\TourLocation;
use App\Models\TourLocationRating;
use Illuminate\Http\Request;

class TourLocationController extends BaseApiController
{

    /**
     * list tour location hot.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?: ResponseStatusCode::LIMIT;
        $docs = TourLocation::where('highlights', ResponseStatusCode::HOT);
        $docs = $docs->paginate($limit);
        $total = $docs->total();
        $data = [
            'docs'  => TourLocationResource::collection($docs),
            'total' => $total,
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_list_tour_location_highlights'), $data);
    }

    /**
     * list tour location.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function listLocations(Request $request)
    {
        $limit = $request->limit ?: ResponseStatusCode::LIMIT;
        $docs = TourLocation::orderBy('id', 'DESC');
        $docs = $docs->paginate($limit);
        $total = $docs->total();
        $data = [
            'docs'  => TourLocationResource::collection($docs),
            'total' => $total,
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.list_tour_location'), $data);
    }

    /**
     * get info tourlocation.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function locationItem(Request $request, $id)
    {
        $docs = TourLocation::find($id);
        if ($docs) {
            $data = [
                'docs' => new TourLocationResource($docs),
            ];
        } else {
            return $this->jsonApi(ResponseStatusCode::OK, __('Địa điểm ko tồn tại'));
        }
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_info_tour_location'), $data);
    }

    /**
     * list rating tourloaction.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function rattingTourLocation($id)
    {
        $rating = TourLocationRating::where('location_id', $id)
            ->where('type', ConstCodeApi::TYPE_RATTING_TOUR_LOCATION)->get();
        $data = [
            'docs' => TourLocationRatingResource::collection($rating),
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_info_tour_location'), $data);
    }

    /**
     * ratting display tourlocation.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function rattingTourLocationDisplay($id)
    {
        $rating = TourLocationRating::where('location_id', $id)
            ->where('type', ConstCodeApi::TYPE_RATTING_TOUR_LOCATION)
            ->orderby('star_rating', 'DESC')->paginate(ConstCodeApi::DISPLAY_STAR);
        $data = [
            'docs' => TourLocationRatingResource::collection($rating),
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_info_tour_location'), $data);
    }

    /**
     * list tour with tour locaion.
     *
     * @param  $id
     *
     * @return json
     */
    public function tourHotWithTourLocation($id)
    {
        $tourhot = Tour::where('tour_location_id', $id)
            ->where('hot', ConstCodeApi::HOT)->paginate(ConstCodeApi::LIMIT);
        $data = [
            'docs' => \App\Http\Resources\Tour::collection($tourhot),
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_info_tour_location'), $data);
    }

    /**
     * list tour hot new with tour locaion.
     *
     * @param  $id
     *
     * @return json
     */
    public function tourHotNewWithTourLocation($id)
    {
        $tourhot = Tour::where('tour_location_id', $id)
            ->where('hot', ConstCodeApi::HOT)->orderby('id', 'DESC')->paginate(ConstCodeApi::LIMIT);
        $data = [
            'docs' => \App\Http\Resources\Tour::collection($tourhot),
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_info_tour_location'), $data);
    }

    /**
     * list tour hot new with tour locaion.
     *
     * @param  $id
     *
     * @return json
     */
    public function tourCategoryWithTourLocation($id)
    {
//        làm sau
//        $tourhot = Tour::whereJsonContains('category_id', 7)->get();
//        dd($tourhot);
//        $data = [
//            'docs' => \App\Http\Resources\Tour::collection($tourhot),
//        ];
//        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_info_tour_location'), $data);
    }
}

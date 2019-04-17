<?php

namespace App\Http\Controllers\API;

use App\Constants\ResponseStatusCode;
use App\Http\Resources\Tour as TourResource;
use App\Models\Tour;
use App\User;
use Illuminate\Http\Request;

class TourController extends BaseApiController
{
    /**
     * Tour hot .
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function indexHot(Request $request)
    {
        $limit = $request->limit ?: ResponseStatusCode::LIMIT;
        $docs = Tour::orderBy('booked_number', 'DESC');
        $docs = $docs->paginate($limit);
        $total = $docs->total();
        $data = [
            'data'  => TourResource::collection($docs),
            'total' => $total,
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_list_Tour_location_highlights'), $data);
    }

    /**
     * add history view user.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function historyTourView(Request $request)
    {
        $user = User::find($request->jwtUser->id);
        $arr = [];
        if ($user->list_tour_id) {
            foreach ($user->list_tour_id as $k) {
                array_push($arr, $k['id']);
            }
        } else {
            return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_history_view_tour'), []);
        }

        $docs = Tour::whereIn('id', $arr)->get();
        $total = count($docs);
        $data = [
            'data'  => TourResource::collection($docs),
            'total' => $total,
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_history_view_tour'), $data);
    }

    /**
     * add history user.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function recentlyTourView(Request $request)
    {
        $user = User::find($request->jwtUser->id);
        $arr = [];
        if ($user->list_tour_id) {
            foreach ($user->list_tour_id as $k) {
                array_push($arr, $k['id']);
            }
        } else {
            return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_history_view_tour'), []);
        }
        $list = Tour::whereIn('id', $arr)->pluck('tour_location_id');
        $docs = Tour::whereIn('tour_location_id', $list)->whereNotIN('id', $arr)->get();
        $total = count($docs);
        $data = [
            'data'  => TourResource::collection($docs),
            'total' => $total,
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_history_view_tour'), $data);
    }

//    /**
//     * re.
//     *
//     * @param  \Illuminate\Http\Request $request
//     *
//     * @return json
//     */
//    public function recentlyTourView(Request $request)
//    {
//        $user = User::find($request->jwtUser->id);
//        $arr = [];
//        if ($user->list_tour_id) {
//            foreach ($user->list_tour_id as $k) {
//                array_push($arr, $k['id']);
//            }
//        } else {
//            return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_history_view_tour'), []);
//        }
//        $list = Tour::whereIn('id', $arr)->pluck('tour_location_id');
//        $docs = Tour::whereIn('tour_location_id', $list)->whereNotIN('id', $arr)->get();
//        $total = count($docs);
//        $data = [
//            'data'  => TourResource::collection($docs),
//            'total' => $total,
//        ];
//        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_history_view_tour'), $data);
//    }
}

<?php

namespace App\Http\Controllers\API;

use App\Constants\ResponseStatusCode;
use App\Models\TourLocation;
use Illuminate\Http\Request;
use App\Http\Resources\TourLocation as TourLocationResource;

class PolicyController extends BaseApiController
{
    //
    public function index(Request $request)
    {
//        $limit = $request->limit ?: ResponseStatusCode::LIMIT;
//        $docs = TourLocation::where('highlights', ResponseStatusCode::HOT);
//        $docs = $docs->paginate($limit);
//        $total = $docs->total();
//        $data = [
//            'docs'  => TourLocationResource::collection($docs),
//            'total' => $total,
//        ];
//        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_list_tour_location_highlights'), $data);
    }

    public function listLocations(Request $request)
    {
//        $limit = $request->limit ?: ResponseStatusCode::LIMIT;
//        $docs = TourLocation::orderBy('id', 'DESC');
//        $docs = $docs->paginate($limit);
//        $total = $docs->total();
//        $data = [
//            'docs'  => TourLocationResource::collection($docs),
//            'total' => $total,
//        ];
//        return $this->jsonApi(ResponseStatusCode::OK, __('flash.list_tour_location'), $data);
    }

    public function locationItem(Request $request, $id)
    {
//        $docs = TourLocation::find($id);
//        if ($docs) {
//            $data = [
//                'docs' => new TourLocationResource($docs),
//            ];
//        } else {
//            return $this->jsonApi(ResponseStatusCode::OK, __('Địa điểm ko tồn tại'));
//        }
//        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_info_tour_location'), $data);
    }
}

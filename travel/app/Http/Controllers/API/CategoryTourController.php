<?php

namespace App\Http\Controllers\API;

use App\Constants\ConstCodeApi;
use App\Constants\ResponseStatusCode;
use App\Http\Resources\CategoryTour as CategoryTourResource;
use App\Models\CategoryTour;
use Illuminate\Http\Request;

class CategoryTourController extends BaseApiController
{
    /**
     * List Cagtegory.
     *
     * @param  \Illuminate\Http\Request $request , $id
     *
     * @return json
     */
    public function index(Request $request, $id)
    {
        $limit = $request->limit ?: ConstCodeApi::LIMIT;
        $docs = CategoryTour::with('tours')->where('id', $id);
        $docs = $docs->paginate($limit);
        $total = $docs->total();
        $data = [
            'data'  => CategoryTourResource::collection($docs),
            'total' => $total,
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('auth.list_tour_with_category'), $data);
    }
}

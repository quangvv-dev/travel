<?php

namespace App\Http\Controllers\API;

use App\Constants\ResponseStatusCode;
use App\Http\Resources\SearchKeyword as SearchKeywordResource;
use App\Models\SearchKeyword;
use Illuminate\Http\Request;

class SearchKeywordController extends BaseApiController
{
    /**
     * index keyword.
     *
     * @param  $request
     *
     * @return json
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?: ResponseStatusCode::LIMIT;
        $docs = SearchKeyword::orderBy('id', 'DESC');
        $docs = $docs->paginate($limit);
        $total = $docs->total();
        $data = [
            'data'  => SearchKeywordResource::collection($docs),
            'total' => $total,
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_list_Tour_location_highlights'), $data);
    }
}

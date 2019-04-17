<?php

namespace App\Http\Controllers\API;

use App\Constants\ResponseStatusCode;
use App\Http\Resources\Rank as RankResource;
use App\Http\Resources\UserRank as UserRankResource;
use App\Models\Rank;
use App\Models\UserRank;
use Illuminate\Http\Request;

class LevelController extends BaseApiController
{
    /**
     * rank user.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return json
     */
    public function index(Request $request)
    {
        $docs = UserRank::where('user_id', $request->jwtUser->id)->with('rank')->first();
        $rank_next = Rank::Where('point_level', '>', $docs->rank->point_level)->first();

        $data = [
            'data'      => new UserRankResource($docs),
            'rank_next' => new RankResource($rank_next),
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.get_list_Tour_location_highlights'), $data);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Constants\ConstCodeApi;
use App\Constants\ResponseStatusCode;
use App\Http\Resources\Video as VideoResources;
use App\Http\Services\UserApiService;
use App\Models\Rank;
use App\Models\UserRank;
use App\Models\Video;
use App\User;
use Illuminate\Http\Request;

class VideoController extends BaseApiController
{
    //
    public function __construct(UserApiService $userApiService)
    {
        $this->serve = $userApiService;
    }

    /**
     * list video display.
     *
     * @param  $request
     *
     * @return json
     */
    public function index(Request $request)
    {
        $docs = Video::where('type', ConstCodeApi::ACTIVE)->orderby('updated_at', 'ASC')->get();
        return $this->jsonApi(
            ResponseStatusCode::OK,
            __('flash.get_list_Tour_location_highlights'),
            VideoResources::collection($docs)
        );
    }

    /**
     * plus point.
     *
     * @param  $request
     *
     * @return json
     */
    public function plusPoint(Request $request)
    {
        $rank_point = UserRank::where('user_id', $request->jwtUser->id)->first();
        $member_point = $rank_point->member_point + $request->point;
        $rank_old = Rank::find($rank_point->rank_id);
        $rank_id = Rank::where('point_level', '>=', $rank_old->point_level)->orderBy('point_level', 'Desc')->first();
        if ($member_point > $rank_id->point_level) {
            $rank_point->update([
                'member_point' => $member_point,
                'rank_id'      => $rank_id->id,
            ]);
            return $this->jsonApi(
                ResponseStatusCode::OK,
                __('flash.plus_point_ss_lencap'),
                new \App\Http\Resources\UserRank($rank_point)
            );
        } else {
            $rank_point->update([
                'member_point' => $member_point,
                'rank_id'      => $rank_old->id,
            ]);
            return $this->jsonApi(
                ResponseStatusCode::OK,
                __('flash.plus_point_ss'),
                new \App\Http\Resources\UserRank($rank_point)
            );
        }
    }

    /**
     * update list view history .
     *
     * @return jsonApi
     */
    public function viewVideo(Request $request)
    {
        $validate = [
            'list_view_video' => 'required',

        ];
        $this->validator($request, $validate);

        if (empty($this->error)) {
            $user = User::find($request->jwtUser->id);
            if (!$user->list_view_video) {
                $list_view_video = @json_encode($request->list_view_video);
                $this->serve->update_video($list_view_video, $user);
                return $this->jsonApi(
                    ResponseStatusCode::OK,
                    __('auth.update_list_video_seed_SS')
                );
            } else {
                $list_view_video = $user->list_view_video;
                $list_view_video_new = $request->list_view_video;
                $tamp = 0;
                foreach ($list_view_video as $k) {
                    foreach ($list_view_video_new as $v) {
                        if ($k['id'] == $v['id']) {
                            $tamp = $v['id'];
                            break;
                        }
                    }
                }

                if ($tamp != 0) {
                    return $this->jsonApi(
                        ResponseStatusCode::OK,
                        __('auth.Tour_da_co_trong_danh_sach_da_xem')
                    );
                } else {
                    if (count($list_view_video) == 6) {
                        unset($list_view_video[0]);
                        $list_view_video_update = json_encode(array_merge($list_view_video, $list_view_video_new));
                        $this->serve->update_video($list_view_video_update, $user);
                        return $this->jsonApi(ResponseStatusCode::OK, __('auth.Tour_da_xem_dc_update'));
                    } else {
                        $list_view_video_update = json_encode(array_merge($list_view_video, $list_view_video_new));
                        $this->serve->update_video($list_view_video_update, $user);
                        return $this->jsonApi(ResponseStatusCode::OK, __('auth.Tour_da_xem_dc_update'));
                    }
                }
            }
            return $this->jsonApi(ResponseStatusCode::OK, __('auth.update_thanh_cong'));
        } else {
            return $this->jsonApi(ResponseStatusCode::BAD_REQUEST, $this->error);
        }
    }
}

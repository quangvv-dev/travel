<?php

namespace App\Http\Services;

use App\Constants\ConstCodeApi;

class UserApiService
{
    /**
     * Action update history_view
     *
     * @param $request
     * @param $user
     */
    public static function updatehistory($tour_id, $user)
    {
        $user->update(['list_tour_id' => $tour_id]);
    }

    /**
     * Action update history_view_video
     *
     * @param $request
     * @param $user
     */
    public static function updateVideo($tour_id, $user)
    {
        $user->update(['list_view_video' => $tour_id]);
    }

    /**
     * Action update password
     *
     * @param $password (or password_new)
     * @param $user
     */
    public static function updatePasword($password, $user)
    {
        $user->update(['password' => bcrypt($password)]);
    }

    /**
     * Action update active phone
     *
     * @param $user
     */
    public static function isVerified($user)
    {
        $user->update(['is_verified' => ConstCodeApi::IS_VERIFIED]);
    }

    /**
     * Action update User profile
     *
     * @param $password (or password_new)
     * @param $user
     */
    public static function update($request, $user)
    {
        $user->update($request->all());
    }

    /**
     * Action update User profile
     *
     * @param $password (or password_new)
     * @param $user
     */
    public static function updateAvatar($avatar, $user)
    {
        $user->update(['image' => $avatar]);
    }
}

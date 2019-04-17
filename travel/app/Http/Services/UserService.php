<?php

namespace App\Http\Services;

use App\Constants\StatusCode;
use App\Helpers\ResponseUtil;
use App\Models\UserRank;
use App\User;
use Carbon\Carbon;
use File;

class UserService
{

    /**
     * Action add User
     *
     * @param $request
     */
    public static function createUser($request)
    {

        if ($request->hasFile('image_file')) {
            $image = ResponseUtil::upload($request->file('image_file'), 'user');
        }

        $user = User::create([
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'phone'         => $request->phone ? $request->phone : null,
            'parent_id'     => isset($request->parent_id) ? $request->parent_id : 0,
            'facebook_id'   => $request->facebook_id ? $request->facebook_id : null,
            'facebook_link' => $request->facebook_link ? $request->facebook_link : null,
            'image'         => isset($image) && $image ? $image : null,
            'is_verified'   => 0,
            'role'          => StatusCode::MEMBER,
            'wallet'        => 0,
        ]);
        if (isset($user)) {
            $user_rank = UserRank::create([
                'user_id'      => $user->id,
                'member_point' => 0,
                'rank_id'      => 1,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ]);
        }
    }

    /**
     * Action update User
     *
     * @param $request
     * @param $user
     */
    public static function updateUser($request, $user)
    {

        $data = [
            'username'    => $request->username,
            'parent_id'   => isset($request->parent_id) ? $request->parent_id : 0,
            'email'       => $request->email,
            'phone'       => $request->phone ?: null,
            'is_verified' => 0,
            'role'        => StatusCode::MEMBER,
        ];
        if ($request->hasFile('image_file')) {
            $image = ResponseUtil::upload($request->file('image_file'), 'user');
            $data['image'] = isset($image) && $image ? $image : null;
        }
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
    }

    /**
     * Action destroy User
     *
     * @param $request
     * @param $user
     */
    public static function destroyUser($request, $user)
    {

        File::delete('uploads/user/' . $user->image);
        $user->userRank->delete();
        $user->delete();
    }
}

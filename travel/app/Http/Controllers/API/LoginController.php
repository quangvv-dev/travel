<?php

namespace App\Http\Controllers\API;

use App\Constants\ConstCodeApi;
use App\Constants\ResponseStatusCode;
use App\Helpers\Thumbnail;
use App\Http\Resources\User as UserResource;
use App\Http\Services\UserApiService;
use App\Models\Rank;
use App\Models\SettingPoint;
use App\Models\UserRank;
use App\User;
use Illuminate\Http\Request;

class LoginController extends BaseApiController
{

    public $setting;
    public $rank;

    public function __construct(UserApiService $userApiService)
    {
        $this->serve = $userApiService;
        $this->setting = SettingPoint::first();
        $this->rank = Rank::orderby('point_level', 'ASC')->first();
    }

    /**
     * login api.
     *
     * @param phone, password
     *
     * @return jsonApi
     */
    public function login(Request $request)
    {
        $validate = [
            'phone'    => 'required|min:10|max:14',
            'password' => 'required|min:6|max:14',
        ];
        $this->validator($request, $validate);
        $credentials = $request->only('phone', 'password');

        if (empty($this->error)) {
            $acc = User::where('phone', $credentials['phone'])
                ->where('role', ResponseStatusCode::ROLE_USER)->first();
            if (!empty($acc)) {
                if (password_verify($credentials['password'], $acc->password)) {
                    $payload = $acc->toArray();
                    $data = [
                        'token' => jwtencode($payload),
                        'info'  => new UserResource($acc),
                    ];
                    return $this->jsonApi(
                        ResponseStatusCode::OK,
                        __('auth.signin_success'),
                        $data
                    );
                } else {
                    return $this->jsonApi(
                        ResponseStatusCode::BAD_REQUEST,
                        __('auth.phone_or_password_incorrect')
                    );
                }
            } else {
                return $this->jsonApi(
                    ResponseStatusCode::BAD_REQUEST,
                    __('auth.phone_or_password_incorrect')
                );
            }
        } else {
            return $this->jsonApi(
                ResponseStatusCode::BAD_REQUEST,
                $this->error,
                [],
                0
            );
        }
    }

    /**
     * register user.
     *
     * @param username, password, phone
     *
     * @return jsonApi
     */
    public function register(Request $request)
    {
        $validate = [
            'username' => 'required|min:2|max:50',
            'password' => 'required|min:6|max:14',
            'phone'    => 'required|unique:users|max:14:min:10',
        ];
        $this->validator($request, $validate);
        $parent = 0;
        if ($request->presenter) {
            $parent = User::where('phone', $request->presenter)
                ->where('is_verified', ConstCodeApi::ACTIVE)->first();
        }

        if (empty($this->error) && !$parent) {
            $user = new User();
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            if ($parent != 0) {
                $user->parent_id = $parent->id;
            }
            $user->save();
            \App\Models\UserRank::create([
                'user_id'      => $user->id,
                'member_point' => $this->setting->point_default,
                'rank_id'      => $this->rank->id,
            ]);
            $payload = $user->toArray();
            $data = [
                'token' => jwtencode($payload),
                'info'  => new UserResource($user),
            ];
            return $this->jsonApi(
                ResponseStatusCode::OK,
                __('auth.login_params_not_valid'),
                $data
            );
        } else {
            return $this->jsonApi(
                ResponseStatusCode::BAD_REQUEST,
                $this->error,
                [],
                0
            );
        }
    }

    /**
     * update status phone number.
     *
     * @param $request
     *
     * @return jsonApi
     */
    public function isVerified(Request $request)
    {
        $user = User::where('phone', $request->phone)->orderBy('created_at', 'DESC')->first();
        $this->serve->isVerified($user);
        $payload = $user->toArray();
        $data = [
            'token' => jwtencode($payload),
            'info'  => new UserResource($user),
        ];
        return $this->jsonApi(
            ResponseStatusCode::OK,
            __('auth.login_params_not_valid'),
            $data
        );
    }

    /**
     * Checking phonenumber.
     *
     * @param phone
     *
     * @return jsonApi
     */
    public function forgotPassword(Request $request)
    {
        $validate = [
            'phone' => 'required',
        ];
        $this->validator($request, $validate);
        if (empty($this->error)) {
            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                return $this->jsonApi(
                    ResponseStatusCode::OK,
                    __('auth.account_exists'),
                    new UserResource($user)
                );
            } else {
                return $this->jsonApi(
                    ResponseStatusCode::BAD_REQUEST,
                    __('auth.account_not_exists')
                );
            }
        } else {
            return $this->jsonApi(
                ResponseStatusCode::BAD_REQUEST,
                $this->error
            );
        }
    }

    /**
     * update password.
     *
     * @param phone, password
     *
     * @return jsonApi
     */
    public function updatePassword(Request $request)
    {
        $validate = [
            'password' => 'required|min:6|max:14',
            'phone'    => 'required|max:14',
        ];
        $this->validator($request, $validate);
        if (empty($this->error)) {
            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                $this->serve->updatePasword($request->password, $user);
                return $this->jsonApi(
                    ResponseStatusCode::OK,
                    __('auth.mk thanh cong'),
                    new UserResource($user)
                );
            } else {
                return $this->jsonApi(
                    ResponseStatusCode::BAD_REQUEST,
                    __('auth.user_ko_ton_tai')
                );
            }
        }
        return $this->jsonApi(
            ResponseStatusCode::BAD_REQUEST,
            $this->error
        );
    }

    /**
     * chage password.
     *
     * @param password, password_new
     *
     * @return jsonApi
     */
    public function chagePassword(Request $request)
    {
        $user = User::find($request->jwtUser->id);
        $validate = [
            'password'     => 'required|min:6|max:14',
            'password_new' => 'required|min:6|max:14',
        ];
        $this->validator($request, $validate);
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                $this->serve->updatePasword($request->password_new, $user);
                return $this->jsonApi(
                    ResponseStatusCode::OK,
                    __('auth.chage_password_ss'),
                    new UserResource($user)
                );
            } else {
                return $this->jsonApi(
                    ResponseStatusCode::BAD_REQUEST,
                    __('auth.password_fail')
                );
            }
        }
    }

    /**
     * login api fb.
     *
     * @param info fb
     *
     * @return jsonApi
     */
    public function loginFb(Request $request)
    {
        $validate = [
            'uid' => 'required',
        ];
        $this->validator($request, $validate);
        if (empty($this->error)) {
            $fb = User::where('facebook_id', $request->uid)->first();
            if ($fb) {
                $payload = $fb->toArray();
                $data = [
                    'token' => jwtencode($payload),
                    'info'  => new UserResource($fb),
                ];
                return $this->jsonApi(
                    ResponseStatusCode::OK,
                    __('auth.signin_success'),
                    $data
                );
            } else {
                $user = new User();
                $user->username = $request->displayName;
                $user->email = $request->email;
                $user->phone = $request->phoneNumber;
                $user->facebook_id = $request->uid;
                $user->save();
                UserRank::create([
                    'user_id'      => $user->id,
                    'member_point' => $this->setting->point_default,
                    'rank_id'      => $this->rank->id,
                ]);
                $payload = $user->toArray();
                $data = [
                    'token' => jwtencode($payload),
                    'info'  => new UserResource($user),
                ];
                return $this->jsonApi(
                    ResponseStatusCode::OK,
                    __('auth.signin_success'),
                    $data
                );
            }
        } else {
            return $this->jsonApi(ResponseStatusCode::BAD_REQUEST, $this->error);
        }
    }

    /**
     * login api gg.
     *
     * @param info gg
     *
     * @return jsonApi
     */
    public function loginGg(Request $request)
    {
        $validate = [
            'id' => 'required',
        ];
        $this->validator($request, $validate);
        if (empty($this->error)) {
            $gg = User::where('google_id', $request->id)->first();
            if ($gg) {
                $payload = $gg->toArray();
                $data = [
                    'token' => jwtencode($payload),
                    'info'  => new UserResource($gg),
                ];
                return $this->jsonApi(ResponseStatusCode::OK, __('auth.signin_success'), $data);
            } else {
                $gg = User::create([
                    'username'  => $request->name,
                    'email'     => $request->email,
                    'phone'     => $request->phoneNumber,
                    'google_id' => $request->id,
                ]);
                UserRank::create([
                    'user_id'      => $gg->id,
                    'member_point' => $this->setting->point_default,
                    'rank_id'      => $this->rank->id,
                ]);
                $payload = $gg->toArray();
                $data = [
                    'token' => jwtencode($payload),
                    'info'  => new UserResource($gg),
                ];
                return $this->jsonApi(ResponseStatusCode::OK, __('auth.signin_success'), $data);
            }
        } else {
            return $this->jsonApi(ResponseStatusCode::BAD_REQUEST, $this->error);
        }
    }

    /**
     * update list tourt view .
     *
     * @param $request
     *
     * @return jsonApi
     */
    public function clickTour(Request $request)
    {
        $validate = [
            'tour_id' => 'required',
        ];
        $this->validator($request, $validate);

        if (empty($this->error)) {
            $user = User::find($request->jwtUser->id);
            if (!$user->list_tour_id) {
                $tour_id = @json_encode($request->tour_id);
                $this->serve->updatehistory($tour_id, $user);
                return $this->jsonApi(ResponseStatusCode::OK, __('auth . Tour_da_xem_dc_update'));
            } else {
                $tour_id = $user->list_tour_id;
                $tour_id_new = $request->tour_id;
                $tamp = 0;
                foreach ($tour_id as $k) {
                    foreach ($tour_id_new as $v) {
                        if ($k['id'] == $v['id']) {
                            $tamp = $v['id'];
                            break;
                        }
                    }
                }
                if ($tamp != 0) {
                    return $this->jsonApi(ResponseStatusCode::OK, __('auth . Tour_da_co_trong_danh_sach_da_xem'));
                } else {
                    if (count($tour_id) == 6) {
                        unset($tour_id[0]);
                        $tour_id_update = json_encode(array_merge($tour_id, $tour_id_new));
                        $this->serve->updatehistory($tour_id_update, $user);
                        return $this->jsonApi(ResponseStatusCode::OK, __('auth . Tour_da_xem_dc_update'));
                    } else {
                        $tour_id_update = json_encode(array_merge($tour_id, $tour_id_new));
                        $this->serve->updatehistory($tour_id_update, $user);
                        return $this->jsonApi(ResponseStatusCode::OK, __('auth . Tour_da_xem_dc_update'));
                    }
                }
            }
            return $this->jsonApi(ResponseStatusCode::OK, __('auth . update_thanh_cong'));
        } else {
            return $this->jsonApi(ResponseStatusCode::BAD_REQUEST, $this->error, [], 0);
        }
    }

    /**
     * getinfo .
     *
     * @param $request
     *
     * @return jsonApi
     */
    public function getInfo(Request $request)
    {
        $user = User::find($request->jwtUser->id);
        return $this->jsonApi(ResponseStatusCode::OK, __('auth . get_info_user'), new UserResource($user));
    }

    /**
     * update profile.
     *
     * @param $request
     *
     * @return jsonApi
     */
    public function updateInfo(Request $request)
    {
        $validate = [
            'username' => 'required | min:2 | max:50',
            'phone'    => 'required | min:10 | max:14 | unique:users,phone,' . $request->jwtUser->id,
        ];
        $this->validator($request, $validate);
        if ($request->phone == $request->jwtUser->phone) {
            $request->merge([
                'is_verified' => ConstCodeApi::IS_VERIFIED_NOT,
            ]);
        }
        if (empty($this->error)) {
            $user = User::find($request->jwtUser->id);
            $this->serve->update($request, $user);
            return $this->jsonApi(
                ResponseStatusCode::OK,
                __('auth . login_params_not_valid'),
                new UserResource($user)
            );
        } else {
            return $this->jsonApi(
                ResponseStatusCode::BAD_REQUEST,
                $this->error,
                [],
                0
            );
        }
    }

    /**
     * update avatar.
     *
     * @param $request
     *
     * @return jsonApi
     */
    public function updateAvatar(Request $request)
    {
        $validate = [
            'avatar' => 'required',
        ];
        $this->validator($request, $validate);
        if (empty($this->error)) {
            $user = User::find($request->jwtUser->id);
            $file = $request->avatar;
            $avatar = $file->getClientOriginalName();
            $img = $file->move('uploads/users', $file->getClientOriginalName());
            $sourcePath = $img->getPath() . '/' . $img->getFilename();
            $thumbPath = $img->getPath() . '/thumb_' . $img->getFilename();
            Thumbnail::generateImageThumbnail($sourcePath, $thumbPath);
            $this->serve->updateAvatar($avatar, $user);
            return $this->jsonApi(
                ResponseStatusCode::OK,
                __('auth . update_avatar_ss'),
                new UserResource($user)
            );
        }
        return $this->jsonApi(ResponseStatusCode::BAD_REQUEST, $this->error, [], 0);
    }
}

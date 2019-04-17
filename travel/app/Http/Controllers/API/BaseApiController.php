<?php
/**
 * Created by PhpStorm.
 * User: tungltdev
 * Date: 17/01/2019
 * Time: 10:24
 */

namespace App\Http\Controllers\API;

use App\Helpers\ResponseUtil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BaseApiController extends Controller
{
    protected $error = [];

    public function jsonApi($code, $message = "", $data = [], $is_validate = 1)
    {
        return response()->json(ResponseUtil::jsonApi($code, $message, $data, $is_validate));
    }

    public function validator($request, $validate)
    {
        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            $this->error = $validator->messages()->toArray();
        }
        return $this->error;
    }
}

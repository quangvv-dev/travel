<?php

namespace App\Http\Controllers\API;

use App\Constants\ConstCodeApi;
use App\Constants\ResponseStatusCode;
use App\Http\Resources\Intro as IntroResource;
use App\Models\Intro;
use Illuminate\Http\Request;

class IntroController extends BaseApiController
{
    //
    /**
     * List images intro.
     *
     * @param  \Illuminate\Http\Request $request , lang
     *
     * @return json
     */
    public function index(Request $request)
    {
        $lang = in_array($request->lang, ['vi', 'en', 'th']) ? $request->lang : 'en';
        $docs = Intro::where('country_id', $lang)->orderby('order', 'ASC')->paginate(ConstCodeApi::LIMIT_INTRO);
        $data = [
            'data'  => IntroResource::collection($docs),
            'total' => count($docs),
        ];
        return $this->jsonApi(ResponseStatusCode::OK, __('flash.intro_image'), $data);
    }
}

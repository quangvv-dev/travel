<?php

namespace App\Http\Services;

use App\Models\Intro;
use File;

class IntroService
{
    /**
     * Add intro
     *
     * @param $request
     */
    public static function create($arr)
    {
        if ($arr['order']) {
            $intro = Intro::where('country_id', $arr['country_id'])->where('order', $arr['order'])->first();
            $intro_old = Intro::select('order')->where('country_id', $arr['country_id'])
                ->orderby('order', 'DESC')->first();
            if ($intro) {
                $intro->update(['order' => $intro_old->order + 1]);
            }
        }
        $intro = Intro::create($arr);
    }

    /**
     * Update intro
     *
     * @param $request
     * @param $rank
     */
    public static function update($arr, $intro)
    {
        $intro->update($arr);
    }

    /**
     * Destroy intro
     *
     * @param $rank
     */
    public static function destroy($intro)
    {
        if (\file_exists(public_path('uploads/intro/' . $intro->images))) {
            unlink('uploads/intro/' . $intro->images);
            unlink('uploads/intro/thumb_' . $intro->images);
        }
        $intro->delete();
    }
}

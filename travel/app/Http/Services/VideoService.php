<?php

namespace App\Http\Services;

use App\Constants\ConstCodeApi;
use App\Models\Video;
use File;

class VideoService
{
    /**
     * Add SettingPoint
     *
     * @param $request
     */
    public static function create($request)
    {
        $point = str_replace(',', '', $request->point);
        $point = str_replace('.', '', $point);
        $request->merge(['point' => $point]);
        if ($request->order && $request->type == ConstCodeApi::DISPLAY) {
            $vides_old = Video::where('type', ConstCodeApi::DISPLAY)->where('order', $request->order)->first();
            if ($vides_old) {
                $vides_old->update(['order' => ConstCodeApi::DEFAULT_VIDEO]);
            }
        }
        $video = Video::create($request->all());
    }

    /**
     * Update SettingPoint
     *
     * @param $request
     * @param $settingPoint
     */
    public static function update($request, $video)
    {
        if ($request->order && $request->type == ConstCodeApi::DISPLAY) {
            $video_old = Video::where('type', ConstCodeApi::DISPLAY)->where('order', $request->order)->first();
            if ($video_old) {
                $video_old->update(['order' => ConstCodeApi::DEFAULT_VIDEO]);
            }
        }
        $video->update($request->all());
    }

    /**
     * Destroy SettingPoint
     *
     * @param $settingPoint
     */
    public static function destroy($request, $video)
    {
        $video->delete();
    }
}

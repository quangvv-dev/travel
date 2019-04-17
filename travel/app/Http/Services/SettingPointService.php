<?php

namespace App\Http\Services;

use App\Models\SettingPoint;
use File;

class SettingPointService
{
    /**
     * Add SettingPoint
     *
     * @param $request
     */
    public static function create($request)
    {

        $settingPoint = SettingPoint::create($request->all());
    }

    /**
     * Update SettingPoint
     *
     * @param $request
     * @param $settingPoint
     */
    public static function update($request, $settingPoint)
    {

        $settingPoint->update($request->all());
    }

    /**
     * Destroy SettingPoint
     *
     * @param $settingPoint
     */
    public static function destroyRank($request, $settingPoint)
    {
        $settingPoint->delete();
    }
}

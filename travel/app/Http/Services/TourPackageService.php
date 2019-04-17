<?php

namespace App\Http\Services;

use App\Models\SettingPoint;
use App\Models\TourPackage;

class TourPackageService
{
    /**
     * Add Package
     *
     * @param $request
     */
    public static function createPackage($request)
    {
        $exchange = SettingPoint::first();
        $exchange_en = $exchange->exchange_en;
        $exchange_th = $exchange->exchange_th;
        $child_pro = $request->price_child_promotion;
        $adult_pro = $request->price_adult_promotion;
        $price_dis = $request->price_disabiliti;
        $price_child = $request->price_child;
        $disabi = $request->price_disabiliti_promotion;
        $price_adult = $request->price_adult;
        $request->merge(
            [
                'time_start'                    =>
                    $request->time_start ? json_encode($request->time_start) : null,
                'price_adult'                   =>
                    $request->price_adult ? str_replace(',', '', $request->price_adult) : 0,
                'price_child'                   =>
                    $request->price_child ? str_replace(',', '', $request->price_child) : 0,
                'price_disabiliti'              =>
                    $request->price_disabiliti ? str_replace(',', '', $request->price_disabiliti) : 0,
                'price_adult_promotion'         =>
                    $request->price_adult_promotion ? str_replace(',', '', $request->price_adult_promotion) : 0,
                'price_child_promotion'         =>
                    $request->price_child_promotion ? str_replace(',', '', $request->price_child_promotion) : 0,
                'price_disabiliti_promotion'    => $disabi ? str_replace(',', '', $disabi) : 0,
                'price_adult_en'                =>
                    $price_adult ? (float)str_replace(',', '', $price_adult) / $exchange_en : 0,
                'price_adult_th'                =>
                    $price_adult ? (float)str_replace(',', '', $price_adult) / $exchange_th : 0,
                'price_disabiliti_en'           =>
                    $price_dis ? (float)str_replace(',', '', $price_dis) / $exchange_en : 0,
                'price_disabiliti_th'           =>
                    $price_dis ? (float)str_replace(',', '', $price_dis) / $exchange_th : 0,
                'price_child_en'                =>
                    $price_child ? (float)str_replace(',', '', $price_child) / $exchange_en : 0,
                'price_child_th'                =>
                    $price_child ? (float)str_replace(',', '', $price_child) / $exchange_th : 0,
                'price_adult_promotion_en'      =>
                    $adult_pro ? (float)str_replace(',', '', $adult_pro) / $exchange_en : 0,
                'price_child_promotion_en'      =>
                    $child_pro ? (float)str_replace(',', '', $child_pro) / $exchange_en : 0,
                'price_disabiliti_promotion_en' =>
                    $disabi ? (float)str_replace(',', '', $disabi) / $exchange_en : 0,
                'price_adult_promotion_th'      =>
                    $adult_pro ? (float)str_replace(',', '', $adult_pro) / $exchange_th : 0,
                'price_child_promotion_th'      =>
                    $child_pro ? (float)str_replace(',', '', $child_pro) / $exchange_th : 0,
                'price_disabiliti_promotion_th' =>
                    $disabi ? (float)str_replace(',', '', $disabi) / $exchange_th : 0,
            ]
        );
        $package = TourPackage::create($request->all());
    }

    /**
     * Update Package
     *
     * @param $request
     * @param $rank
     */
    public static function updatePackage($request, $package)
    {
        $adult_en = $request->price_adult_en;
        $adult_th = $request->price_adult_th;
        $child_en = $request->price_child_en;
        $child_th = $request->price_child_th;
        $disabi_en = $request->price_disabiliti_en;
        $disabi_th = $request->price_disabiliti_th;
        $disabi_pro_en = $request->price_disabiliti_promotion_en;
        $disabi_pro_th = $request->price_disabiliti_promotion_th;
        $adult_pro_en = $request->price_adult_promotion_en;
        $adult_pro_th = $request->price_adult_promotion_th;
        $child_pro_en = $request->price_child_promotion_en;
        $child_pro_th = $request->price_child_promotion_th;
        $disabi = $request->price_disabiliti_promotion;
        $request->merge([
            'time_start'                    =>
                $request->time_start ? json_encode($request->time_start) : null,
            'price_adult'                   =>
                $request->price_adult ? str_replace(',', '', $request->price_adult) : 0,
            'price_child'                   =>
                $request->price_child ? str_replace(',', '', $request->price_child) : 0,
            'price_disabiliti'              =>
                $request->price_disabiliti ? str_replace(',', '', $request->price_disabiliti) : 0,
            'price_adult_promotion'         =>
                $request->price_adult_promotion ? str_replace(',', '', $request->price_adult_promotion) : 0,
            'price_child_promotion'         =>
                $request->price_child_promotion ? str_replace(',', '', $request->price_child_promotion) : 0,
            'price_disabiliti_promotion'    => $disabi ? str_replace(',', '', $disabi) : 0,
            'price_adult_en'                => $adult_en ? str_replace(',', '', $adult_en) : 0,
            'price_adult_th'                => $adult_th ? str_replace(',', '', $adult_th) : 0,
            'price_disabiliti_en'           => $disabi_en ? str_replace(',', '', $disabi_en) : 0,
            'price_disabiliti_th'           => $disabi_th ? str_replace(',', '', $disabi_th) : 0,
            'price_child_en'                => $child_en ? str_replace(',', '', $child_en) : 0,
            'price_child_th'                => $child_th ? str_replace(',', '', $child_th) : 0,
            'price_adult_promotion_en'      => $adult_pro_en ? str_replace(',', '', $adult_pro_en) : 0,
            'price_child_promotion_en'      => $child_pro_en ? str_replace(',', '', $child_pro_en) : 0,
            'price_disabiliti_promotion_en' => $disabi_pro_en ? str_replace(',', '', $disabi_pro_en) : 0,
            'price_adult_promotion_th'      => $adult_pro_th ? str_replace(',', '', $adult_pro_th) : 0,
            'price_child_promotion_th'      => $child_pro_th ? str_replace(',', '', $child_pro_th) : 0,
            'price_disabiliti_promotion_th' => $disabi_pro_th ? str_replace(',', '', $disabi_pro_th) : 0,
        ]);
        $package->update($request->all());
    }

    /**
     * Destroy rank
     *
     * @param $rank
     */
    public static function destroyPackage($request, $package)
    {
        $package->delete();
    }
}

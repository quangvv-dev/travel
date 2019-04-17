<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\SettingPointService;
use App\Models\SettingPoint;
use Illuminate\Http\Request;

class SettingPointController extends Controller
{

    public function __construct(SettingPointService $settingPointService)
    {
        $this->serve = $settingPointService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Cài đặt";
        $setting_point = SettingPoint::first();
        return view('setting_point._form', compact('title', 'setting_point'));
    }

    /**
     * update setting.
     *
     * @return route
     */
    public function update(Request $request)
    {
        $title = "Cài đặt";

        $introduce_friend = str_replace(',', '', $request->introduce_friend);
        $introduce_friend = str_replace('.', '', $introduce_friend);
        $share_location = str_replace(',', '', $request->share_location);
        $share_location = str_replace('.', '', $share_location);
        $share_tour = str_replace(',', '', $request->share_tour);
        $share_tour = str_replace('.', '', $share_tour);
        $rating_tour = str_replace(',', '', $request->rating_tour);
        $rating_tour = str_replace('.', '', $rating_tour);
        $discount_order = str_replace(',', '', $request->discount_order);
        $discount_order = str_replace('.', '', $discount_order);
        $redemption_point_vi = str_replace(',', '', $request->redemption_point_vi);
        $redemption_point_vi = str_replace('.', '', $redemption_point_vi);
        $redemption_point_en = str_replace(',', '', $request->redemption_point_en);
        $redemption_point_en = str_replace('.', '', $redemption_point_en);
        $redemption_point_th = str_replace(',', '', $request->redemption_point_th);
        $redemption_point_th = str_replace('.', '', $redemption_point_th);
        $exchange_en = str_replace(',', '', $request->exchange_en);
        $exchange_en = str_replace('.', '', $exchange_en);
        $exchange_th = str_replace(',', '', $request->exchange_th);
        $exchange_th = str_replace('.', '', $exchange_th);

        $setting_point = SettingPoint::first()->update([
            'introduce_friend'    => $introduce_friend,
            'share_location'      => $share_location,
            'share_tour'          => $share_tour,
            'rating_tour'         => $rating_tour,
            //            'rating_location'     => $request->rating_location,
            'discount_order'      => $discount_order,
            'redemption_point_vi' => $redemption_point_vi,
            'redemption_point_en' => $redemption_point_en,
            'redemption_point_th' => $redemption_point_th,
            'exchange_en'         => $exchange_en,
            'exchange_th'         => $exchange_th,
        ]);
        return redirect()->back();
    }
}

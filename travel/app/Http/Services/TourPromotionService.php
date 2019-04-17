<?php

namespace App\Http\Services;

use App\Models\TourPromotion;
use Carbon\Carbon;
use File;

class TourPromotionService
{
    /**
     * Add tour voucher
     *
     * @param $request
     */
    public static function create($request)
    {
        $money_promotion_vi = str_replace(',', '', $request->money_promotion_vi);
        $money_promotion_vi = str_replace('.', '', $money_promotion_vi);
        $money_promotion_th = str_replace(',', '', $request->money_promotion_th);
        $money_promotion_th = str_replace('.', '', $money_promotion_th);
        $money_promotion_en = str_replace(',', '', $request->money_promotion_en);
        $money_promotion_en = str_replace('.', '', $money_promotion_en);
        $min_price = str_replace(',', '', $request->min_price);
        $min_price = str_replace('.', '', $min_price);
        $max_discount = str_replace(',', '', $request->max_discount);
        $max_discount = str_replace('.', '', $max_discount);
        $current_quantity = str_replace(',', '', $request->current_quantity);
        $current_quantity = str_replace('.', '', $current_quantity);
        $person_quantity = str_replace(',', '', $request->person_quantity);
        $person_quantity = str_replace('.', '', $person_quantity);
        $time_start = Carbon::createFromFormat('d-m-Y', $request->time_start)->format('Y-m-d');
        $time_end = Carbon::createFromFormat('d-m-Y', $request->time_end)->format('Y-m-d');
//        $person_rank = json_encode($request->person_rank);
        $person_rank = [];
        foreach ($request->person_rank as $item) {
            $person_rank[$item] = $item;
        }
        $person_rank = json_encode($person_rank);
        $request->merge([
            'money_promotion_vi' => $money_promotion_vi,
            'money_promotion_th' => $money_promotion_th ? $money_promotion_th : null,
            'money_promotion_en' => $money_promotion_en ? $money_promotion_en : null,
            'min_price'          => $min_price ? $min_price : null,
            'max_discount'       => $max_discount,
            'current_quantity'   => $current_quantity ? $current_quantity : null,
            'person_quantity'    => $person_quantity ? $person_quantity : null,
            'time_start'         => $time_start,
            'time_end'           => $time_end,
            'person_rank'        => $person_rank,
        ]);
        TourPromotion::create($request->all());
    }

    /**
     * update tour voucher
     *
     * @param $request
     */
    public static function update($request, $tourPromotion)
    {
        $money_promotion_vi = str_replace(',', '', $request->money_promotion_vi);
        $money_promotion_vi = str_replace('.', '', $money_promotion_vi);
        $money_promotion_th = str_replace(',', '', $request->money_promotion_th);
        $money_promotion_th = str_replace('.', '', $money_promotion_th);
        $money_promotion_en = str_replace(',', '', $request->money_promotion_en);
        $money_promotion_en = str_replace('.', '', $money_promotion_en);
        $min_price = str_replace(',', '', $request->min_price);
        $min_price = str_replace('.', '', $min_price);
        $max_discount = str_replace(',', '', $request->max_discount);
        $max_discount = str_replace('.', '', $max_discount);
        $current_quantity = str_replace(',', '', $request->current_quantity);
        $current_quantity = str_replace('.', '', $current_quantity);
        $person_quantity = str_replace(',', '', $request->person_quantity);
        $person_quantity = str_replace('.', '', $person_quantity);
        $time_start = Carbon::createFromFormat('d-m-Y', $request->time_start)->format('Y-m-d');
        $time_end = Carbon::createFromFormat('d-m-Y', $request->time_end)->format('Y-m-d');
//        $person_rank = json_encode($request->person_rank);
        $person_rank = [];
        foreach ($request->person_rank as $item) {
            $person_rank[$item] = $item;
        }
        $person_rank = json_encode($person_rank);
        $request->merge([
            'money_promotion_vi' => $money_promotion_vi,
            'money_promotion_th' => $money_promotion_th ? $money_promotion_th : null,
            'money_promotion_en' => $money_promotion_en ? $money_promotion_en : null,
            'min_price'          => $min_price ? $min_price : null,
            'max_discount'       => $max_discount,
            'current_quantity'   => $current_quantity ? $current_quantity : null,
            'person_quantity'    => $person_quantity ? $person_quantity : null,
            'time_start'         => $time_start,
            'time_end'           => $time_end,
            'person_rank'        => $person_rank,
        ]);
        $tourPromotion->update($request->all());
    }

    /**
     * update tour voucher
     *
     * @param $request
     */
    public static function destroy($tourPromotion)
    {
        $tourPromotion->delete();
    }
}

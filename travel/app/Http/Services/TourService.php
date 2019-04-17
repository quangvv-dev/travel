<?php

namespace App\Http\Services;

use App\Helpers\ResponseUtil;
use App\Models\Tour;
use File;

class TourService
{
    /**
     * Add Tour
     *
     * @param $request
     */
    public static function createTour($request)
    {

        if ($request->hasFile('image_file')) {
            $image = ResponseUtil::upload($request->file('image_file'), 'tour');
        }
        $arr = [];
        foreach ($request->category_id as $val) {
            $arr['id'] = $val;
        }
        $tour = Tour::create([
            'booked_number'         => 0,
            'hot'                   => isset($request->highlights) ? $request->highlights : 0,
            'images'                => isset($image) ? $image : '',
            'cancel_time'           => $request->cancel_time ? $request->cancel_time : null,
            'video_id'              => $request->video_id ? $request->video_id : null,
            'default_package'       => $request->default_package ? $request->default_package : null,
            'category_id'           => @json_encode($arr),
            'tour_location_id'      => $request->tour_location_id ? $request->tour_location_id : 0,
            'quantity'              => $request->quantity ? $request->quantity : 0,
            'package_day'           => $request->date_time ? json_encode($request->date_time) : null,
            'address'               => $request->search_name ? $request->search_name : null,
            'lat_long_place'        => $request->lat_rcm && $request->lng_rcm
                ? $request->lat_rcm . '-' . $request->lng_rcm : '',

            //en
            'tour_name_en'          => $request->name_en,
            'tour_description_en'   => $request->tour_description_en ? $request->tour_description_en : null,
            'experience_content_en' => $request->experience_content_en ? $request->experience_content_en : null,
            'tour_services_en'      => $request->tour_services_en ? $request->tour_services_en : null,
            'additional_info_en'    => $request->additional_info_en ? $request->additional_info_en : null,
            'additional_info_2_en'  => @$request->additional_info_2_en,
            'tour_guide_en'         => $request->tour_guide_en ? $request->tour_guide_en : null,
            'faq'                   => $request->faq ? json_encode($request->faq) : null,
            'cancel_policy'         => $request->cancel_policy ? $request->cancel_policy : null,
            //vi
            'tour_name_vi'          => $request->name_vi,
            'tour_description_vi'   => $request->tour_description_vi ? $request->tour_description_vi : null,
            'experience_content_vi' => $request->experience_content_vi ? $request->experience_content_vi : null,
            'tour_services_vi'      => $request->tour_services_vi ? $request->tour_services_vi : null,
            'additional_info_vi'    => $request->additional_info_vi ? $request->additional_info_vi : null,
            'additional_info_2_vi'  => @$request->additional_info_2_vi,
            'tour_guide_vi'         => $request->tour_guide_vi ? $request->tour_guide_vi : null,

            //th
            'tour_name_th'          => $request->name_th,
            'tour_description_th'   => $request->tour_description_th ? $request->tour_description_th : null,
            'experience_content_th' => $request->experience_content_th ? $request->experience_content_th : null,
            'tour_services_th'      => $request->tour_services_th ? $request->tour_services_th : null,
            'additional_info_th'    => $request->additional_info_th ? $request->additional_info_th : null,
            'additional_info_2_th'  => @$request->additional_info_2_th,
            'tour_guide_th'         => $request->tour_guide_th ? $request->tour_guide_th : null,
            'accept'                => $request->accept ? $request->accept : null,
            'quantity'              => $request->quantity ? $request->quantity : null,

        ]);
    }

    /**
     * Update Tour
     *
     * @param $request
     * @param $tour
     */
    public static function updateTour($request, $tour)
    {

        $arr = [];
        foreach ($request->category_id as $val) {
            $arr[$val] = $val;
        }
        $data = [
            'hot'                   => $request->highlights ? $request->highlights : 0,
            'cancel_time'           => $request->cancel_time ? $request->cancel_time : null,
            'video_id'              => $request->video_id ? $request->video_id : null,
            'category_id'           => @json_encode($arr),
            'tour_location_id'      => $request->tour_location_id ? $request->tour_location_id : null,
            'quantity'              => $request->quantity ? $request->quantity : null,
            'package_day'           => $request->date_time ? json_encode($request->date_time) : null,
            'address'               => $request->search_name ? $request->search_name : null,
            'default_package'       => $request->default_package ? $request->default_package : null,


            //en
            'tour_name_en'          => $request->name_en,
            'tour_description_en'   => $request->tour_description_en ? $request->tour_description_en : null,
            'experience_content_en' => $request->experience_content_en ? $request->experience_content_en : null,
            'tour_services_en'      => $request->tour_services_en ? $request->tour_services_en : null,
            'additional_info_en'    => $request->additional_info_en ? $request->additional_info_en : null,
            'additional_info_2_en'  => @$request->additional_info_2_en,
            'tour_guide_en'         => $request->tour_guide_en ? $request->tour_guide_en : null,
            'faq'                   => $request->faq ? json_encode($request->faq) : null,
            'cancel_policy'         => $request->cancel_policy ? $request->cancel_policy : null,
            //vi
            'tour_name_vi'          => $request->name_vi,
            'tour_description_vi'   => $request->tour_description_vi ? $request->tour_description_vi : null,
            'experience_content_vi' => $request->experience_content_vi ? $request->experience_content_vi : null,
            'tour_services_vi'      => $request->tour_services_vi ? $request->tour_services_vi : null,
            'additional_info_vi'    => $request->additional_info_vi ? $request->additional_info_vi : null,
            'additional_info_2_vi'  => $request->additional_info_2_vi,
            'tour_guide_vi'         => $request->tour_guide_vi ? $request->tour_guide_vi : null,

            //th
            'tour_name_th'          => $request->name_th,
            'tour_description_th'   => $request->tour_description_th ? $request->tour_description_th : null,
            'experience_content_th' => $request->experience_content_th ? $request->experience_content_th : null,
            'tour_services_th'      => $request->tour_services_th ? $request->tour_services_th : null,
            'additional_info_th'    => $request->additional_info_th ? $request->additional_info_th : null,
            'additional_info_2_th'  => $request->additional_info_2_th,
            'tour_guide_th'         => $request->tour_guide_th ? $request->tour_guide_th : null,
            'accept'                => $request->accept ? $request->accept : null,
            'quantity'              => $request->quantity ? $request->quantity : null,

        ];
        if ($request->lat_rcm && $request->lng_rcm) {
            $data['lat_long_place'] = $request->lat_rcm && $request->lng_rcm ? $request->lat_rcm
                . '-' . $request->lng_rcm : '';
        }

        if ($request->hasFile('image_file')) {
            $image = ResponseUtil::upload($request->file('image_file'), 'tour');
            $data['images'] = $image;
        }
        $tour->update($data);
    }

    /**
     * Destroy Tour
     *
     * @param $request
     * @param $tour
     */
    public static function destroyTour($request, $tour)
    {
        File::delete('uploads/tour/' . $tour->images);
        $tour->delete();
    }
}

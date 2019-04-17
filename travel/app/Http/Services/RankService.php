<?php

namespace App\Http\Services;

use http\Env\Request;
use App\Helpers\ResponseUtil;
use App\Models\Rank;
use File;

class RankService
{
    /**
     * Add Rank
     *
     * @param $request
     */
    public static function createRank($request)
    {
        if ($request->hasFile('image_file')) {
            $image = ResponseUtil::upload($request->file('image_file'), 'rank');
            $request->merge(['icon' => $image]);
        }
        $rank = Rank::create($request->except('image_file'));
    }

    /**
     * Update Rank
     *
     * @param $request
     * @param $rank
     */
    public static function updateRank($request, $rank)
    {
        if ($request->hasFile('image_file')) {
            $image = ResponseUtil::upload($request->file('image_file'), 'rank');
            $request->merge(['icon' => $image]);
        }
        $rank->update($request->except('image_file'));
    }

    /**
     * Destroy rank
     *
     * @param $rank
     */
    public static function destroyRank($request, $rank)
    {
        File::delete('uploads/rank/' . $rank->icon);
        $rank->delete();
    }
}

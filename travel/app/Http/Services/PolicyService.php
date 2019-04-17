<?php

namespace App\Http\Services;

use App\Models\Policy;
use File;

class PolicyService
{
    /**
     * Add intro
     *
     * @param $request
     */
    public static function create($request)
    {
        Policy::create($request->all());
    }

    /**
     * Update intro
     *
     * @param $request
     * @param $rank
     */
    public static function update($request, $policy)
    {
        $policy->update($request->all());
    }

    /**
     * Destroy intro
     *
     * @param $rank
     */
    public static function destroy($policy)
    {
        $policy->delete();
    }
}

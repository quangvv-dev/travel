<?php

namespace App\Http\Services;

use App\Models\SearchKeyword;
use File;

class SearchKeywordService
{
    /**
     * Add search keyword
     *
     * @param $request
     */
    public static function create($request)
    {
        $category = SearchKeyword::create($request->all());
    }

    /**
     * Update search keyword
     *
     * @param $request
     * @param $searchKeyword
     */
    public static function update($request, $searchKeyword)
    {
        $searchKeyword = $searchKeyword->update($request->all());
    }

    /**
     * Destroy search keyword
     *
     * @param $searchKeyword
     */
    public static function destroy($request, $searchKeyword)
    {
        $searchKeyword->delete();
    }
}

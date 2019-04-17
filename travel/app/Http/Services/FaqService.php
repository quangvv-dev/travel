<?php

namespace App\Http\Services;

use App\Models\Faq;
use File;

class FaqService
{
    /**
     * Add intro
     *
     * @param $request
     */
    public static function create($request)
    {
        Faq::create($request->all());
    }

    /**
     * Update intro
     *
     * @param $request
     * @param $faq
     */
    public static function update($request, $faq)
    {
        $faq->update($request->all());
    }

    /**
     * Destroy intro
     *
     * @param $faq
     */
    public static function destroy($faq)
    {
        $faq->delete();
    }
}

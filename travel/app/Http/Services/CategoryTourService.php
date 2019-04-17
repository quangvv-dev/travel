<?php

namespace App\Http\Services;

use App\Helpers\Thumbnail;
use App\Models\CategoryTour;
use File;

class CategoryTourService
{
    /**
     * Add Rank
     *
     * @param $request
     */
    public static function create($request)
    {

        $file = $request->background;
        $back = $file->getClientOriginalName();
        $img = $file->move('uploads/category_tour', $file->getClientOriginalName());
        $sourcePath = $img->getPath() . '/' . $img->getFilename();
        $thumbPath = $img->getPath() . '/thumb_' . $img->getFilename();
        $arr = $request->toArray();
        $arr['background'] = $back;
        Thumbnail::generateImageThumbnail($sourcePath, $thumbPath);
        $category = CategoryTour::create($arr);
    }

    /**
     * Update
     *
     * @param $request
     * @param $rank
     */
    public static function update($request, $categoryTour)
    {
        $arr = $request->toArray();
        if ($request->hasFile('background')) {
            $file = $request->background;
            $back = $file->getClientOriginalName();
            $img = $file->move('uploads/category_tour', $file->getClientOriginalName());
            $sourcePath = $img->getPath() . '/' . $img->getFilename();
            $thumbPath = $img->getPath() . '/thumb_' . $img->getFilename();
            $arr['background'] = $back;
            Thumbnail::generateImageThumbnail($sourcePath, $thumbPath);
        }
        $category = $categoryTour->update($request->all());
    }

    /**
     * Destroy rank
     *
     * @param $rank
     */
    public static function destroy($request, $categoryTour)
    {
        $categoryTour->delete();
    }
}

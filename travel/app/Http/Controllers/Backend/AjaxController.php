<?php

namespace App\Http\Controllers\Backend;

use App\Constants\StatusCode;
use App\Http\Controllers\Controller;
use App\Models\Taxonomy;
use App\Models\Tour;
use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Check already phone
     *
     * @param Request $request
     *
     * @return int
     */
    public function checkPhone(Request $request)
    {
        $data = User::where('phone', @$request->phone)->where('role', StatusCode::MEMBER)->get();
        if (count($data)) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Check already city
     *
     * @param Request $request
     *
     * @return int
     */
    public function getTaxonomy(Request $request)
    {
        $country = Taxonomy::find($request->id);
        if ($country) {
            $data = Taxonomy::where('parent_id', $country->id)->get();
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['data' => []]);
        }
    }

    /**
     * Check already city
     *
     * @param Request $request
     *
     * @return int
     */
    public function listTourCategory($id)
    {
        $data = Tour::whereJsonContains('category_id->' . $id, $id)->get();
//        $data = Tour::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }
}

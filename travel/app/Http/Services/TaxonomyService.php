<?php

namespace App\Http\Services;

use App\Models\Taxonomy;

class TaxonomyService
{
    /**
     * Add taxonomy
     *
     * @param $request
     */
    public static function createTaxonomy($request)
    {
        $request->merge(['parent_id' => $request->parent_id && $request->parent_id != null ? $request->parent_id : 0]);
        $taxonomy = Taxonomy::create($request->all());
    }

    /**
     * Update taxonomy
     *
     * @param $request
     * @param $taxonomy
     */
    public static function updateTaxonomy($request, $taxonomy)
    {
        $request->merge(['parent_id' => $request->parent_id && $request->parent_id != null ? $request->parent_id : 0]);
        $taxonomy->update($request->all());
    }

    /**
     * Destroy taxonomy
     *
     * @param $rank
     */
    public static function destroyTaxonomy($request, $taxonomy)
    {
        $taxonomy->delete();
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Taxonomy;
use App\Http\Services\TaxonomyService;
use App\Constants\StatusCode;

class TaxonomyController extends Controller
{

    public function __construct(TaxonomyService $taxonomyService)
    {
        $this->serve = $taxonomyService;
        $country = Taxonomy::orderBy('id', 'desc')->where('type', StatusCode::COUNTRY)->get()->pluck('name', 'id');
        view()->share([
            'country' => $country,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $taxonomy = Taxonomy::where('type', '<>', 'GTM')->orderBy('type', 'asc')->orderBy('id', 'desc');
        if ($request->search) {
            $taxonomy = $taxonomy->where('name', 'like', '%' . $request->search . '%')
                ->orwhere('type', 'like', '%' . $request->search . '%');
        }
        if ($request->option) {
            $taxonomy = $taxonomy->where('name', 'like', '%' . $request->option . '%')
                ->orwhere('type', 'like', '%' . $request->option . '%');
        }
        $taxonomy = $taxonomy->paginate(15);
        $title = "Taxonomy Management";
        return view('taxonomy.index', compact('title', 'taxonomy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add new taxonomy";
        return view('taxonomy._form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->serve->createTaxonomy($request);
        return redirect('admin/taxonomy')->with('status', 'Taxonomy created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Taxonomy $taxonomy
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxonomy $taxonomy)
    {
        $title = "Edit taxonomy";
        return view('taxonomy._form', compact('title', 'taxonomy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param Taxonomy $taxonomy
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Taxonomy $taxonomy)
    {
        $this->serve->updateTaxonomy($request, $taxonomy);
        return redirect('admin/taxonomy')->with('status', 'Taxonomy updated successfully !');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param Request  $request
     * @param Taxonomy $taxonomy
     */
    public function destroy(Request $request, Taxonomy $taxonomy)
    {
        $this->serve->destroyTaxonomy($request, $taxonomy);
        $request->session()->flash('error', 'Taxonomy deleted successfully!');
    }
}

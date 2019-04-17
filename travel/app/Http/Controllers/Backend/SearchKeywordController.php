<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\SearchKeywordService;
use App\Models\SearchKeyword;
use App\Models\TourLocation;
use Illuminate\Http\Request;

class SearchKeywordController extends Controller
{

    public function __construct(SearchKeywordService $searchKeywordService)
    {
        $this->serve = $searchKeywordService;
        $location = TourLocation::select('id', 'name_th', 'name_vi', 'name_en')->orderBy('id', 'desc')->get();
        view()->share([
            'location' => $location,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Quản lý từ khóa";

        $searchKeyword = SearchKeyword::orderBy('id', 'desc')->with('tourLocation');
        if ($request->search) {
            $searchKeyword->where('keyword', 'like', '%' . $request->search . '%');
        }
        $searchKeyword = $searchKeyword->paginate(10);
        return view('search_keyword.index', compact('title', 'searchKeyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('search_keyword._form', compact('title'));
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

        $this->serve->create($request);
        return redirect('admin/search_keyword')->with('status', 'Thêm mới thành công!');
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
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SearchKeyword $searchKeyword)
    {

        $title = "Sửa";
        return view('search_keyword._form', compact('title', 'searchKeyword'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SearchKeyword $searchKeyword)
    {
        $this->serve->update($request, $searchKeyword);
        return redirect('admin/search_keyword')->with('status', 'Update thành công! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SearchKeyword $searchKeyword)
    {
        $this->serve->destroy($request, $searchKeyword);
        $request->session()->flash('error', 'Xóa thành công!');
    }
}

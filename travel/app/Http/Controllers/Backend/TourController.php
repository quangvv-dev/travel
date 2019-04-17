<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\TourService;
use App\Models\CategoryTour;
use App\Models\Faq;
use App\Models\Policy;
use App\Models\Taxonomy;
use App\Models\Tour;
use App\Models\TourLocation;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public $package;

    /**
     * TourController constructor.
     */
    public function __construct(TourService $tourService)
    {
        $this->serve = $tourService;
        $location = TourLocation::select('id', 'name_th', 'name_vi', 'name_en')->orderBy('id', 'desc')->get();
        $package = TourPackage::select('id', 'name_th', 'name_vi', 'name_en')->orderBy('id', 'desc')->get();
        $category = CategoryTour::select('id', 'name_th', 'name_vi', 'name_en')->orderBy('id', 'desc')->get();
        $faqs = Faq::select('id', 'question_vi')->orderBy('id', 'desc')->get();
        $policys = Policy::select('id', 'name')->orderBy('id', 'desc')->get();
        $accept = Taxonomy::select('id', 'name')->orderBy('id', 'desc')->where('type', 'accept')->get();

        view()->share([
            'location' => $location,
            'package'  => $package,
            'category' => $category,
            'accepts'  => $accept,
            'faqs'     => $faqs,
            'policys'  => $policys,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tour = Tour::orderBy('id', 'desc')->orderBy('booked_number', 'desc')->with('packageDefault');
        if ($request->search) {
            $tour = $tour->where('tour_name_en', 'like', '%' . $request->search . '%')
                ->orwhere('tour_name_vi', 'like', '%' . $request->search . '%')
                ->orwhere('tour_name_th', 'like', '%' . $request->search . '%');
        }
        $tour = $tour->paginate(10);
        $title = "Quản lý tour";
        return view('tour.index', compact('title', 'tour'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('tour._form', compact('title'));
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
        if ($request->name_vi == null || $request->search_name == null || $request->default_package == null ||
            $request->tour_location_id == null || $request->category_id == null) {
            return redirect('/admin/tour/create')->with('error', 'Some required fields are missing ');
        }
        $this->serve->createTour($request);
        return redirect('admin/tour')->with('status', 'Thêm mới tour thành công!');
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
    public function edit(Tour $tour)
    {
        $title = "Sửa";
        return view('tour._form', compact('title', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        if ($request->name_vi == null || $request->search_name == null || $request->default_package == null ||
            $request->tour_location_id == null || $request->category_id == null) {
            return redirect('/admin/tour/' . $tour->id . '/edit')->with('error', 'Some required fields are missing ');
        }
        $this->serve->updateTour($request, $tour);
        return redirect('admin/tour')->with('status', 'Cập nhật tour thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tour $tour)
    {
        $this->serve->destroyTour($request, $tour);
        $request->session()->flash('error', 'Xóa tour thành công!');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Constants\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Services\TourLocationService;
use App\Models\Taxonomy;
use App\Models\TourLocation;
use Illuminate\Http\Request;

class TourLocationController extends Controller
{

    /**
     * TourLocationController constructor.
     *
     * @param TourLocationService $rankService
     */
    public function __construct(TourLocationService $locationService)
    {
        $country = Taxonomy::orderBy('id', 'asc')->where('type', StatusCode::COUNTRY)->get()->pluck('name', 'id');
        $city = Taxonomy::orderBy('id', 'asc')->where('type', StatusCode::CITY)->get()->pluck('name', 'id');
        $gtm = Taxonomy::orderBy('id', 'asc')->where('type', 'GTM')->get()->pluck('name', 'id');
        $this->serve = $locationService;
        view()->share([
            'page'       => 'tour_location',
            'highlights' => [
                StatusCode::NONE      => 'None',
                StatusCode::HIGHLIGHT => 'YES',
            ],
            'country'    => $country,
            'city'       => $city,
            'gtm'        => $gtm,
        ]);
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $location = TourLocation::orderBy('id', 'desc')->orderBy('view', 'asc')->withCount('tour');
        if ($request->search) {
            $location = $location->where('name_en', 'like', '%' . $request->search . '%')
                ->orwhere('name_vi', 'like', '%' . $request->search . '%')
                ->orwhere('name_th', 'like', '%' . $request->search . '%');
        }
        $location = $location->paginate(10);
        $title = "Quản lý địa điểm";
        return view('tour_location.index', compact('title', 'location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('tour_location._form', compact('title'));
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
        if ($request->name_vi == null || $request->city_id == null || $request->search_name == null) {
            return redirect('/admin/tour-location/create')->with('error', 'Some required fields are missing ');
        }
        $this->serve->createLocation($request);
        return redirect('admin/tour-location')->with('status', 'Tạo địa điểm thành công!');
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
    public function edit(TourLocation $tourLocation)
    {
        $lat_long = explode("-", $tourLocation->lat_long);
        $lat = $lat_long[0];
        $long = $lat_long[1];
        $title = "Edit new location";
        return view('tour_location._form', compact('title', 'tourLocation', 'lat', 'long'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourLocation $tourLocation)
    {
        if ($request->name_vi == null || $request->city_id == null || $request->search_name == null) {
            return redirect('/admin/tour-location/' . $tourLocation->id . '/edit')
                ->with('error', 'Some required fields are missing ');
        }
        $this->serve->updateLocation($request, $tourLocation);
        return redirect('admin/tour-location')->with('status', 'Cập nhật địa điểm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TourLocation $tourLocation)
    {
        $this->serve->destroyLocation($request, $tourLocation);
        $request->session()->flash('error', 'Xóa địa điểm thành công!');
    }
}

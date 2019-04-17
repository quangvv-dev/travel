<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\TourPackageService;
use App\Models\TourPackage;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    /**
     * TourPackageController constructor.
     *
     * @param RankService $rankService
     */
    public function __construct(TourPackageService $packageService)
    {
        $this->serve = $packageService;
        view()->share([
            'page' => 'rank',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $package = TourPackage::orderBy('id', 'desc');
        if ($request->search) {
            $package = $package->where('name_en', 'like', '%' . $request->search . '%')
                ->orwhere('name_vi', 'like', '%' . $request->search . '%')
                ->orwhere('name_th', 'like', '%' . $request->search . '%');
        }
        $package = $package->paginate(10);
        $title = "Quản lý gói";
        return view('package.index', compact('title', 'package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới gói";
        return view('package._form', compact('title'));
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

        if ($request->name_vi == null || $request->price_adult == null || $request->price_child == null ||
            $request->price_disabiliti == null) {
            return redirect('/admin/package/create')->with('error', 'Some required fields are missing ');
        }
        $this->serve->createPackage($request);
        return redirect('admin/package')->with('status', 'Package created successfully!');
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
    public function edit(TourPackage $package)
    {
        $title = "Sửa";
        return view('package._form', compact('title', 'package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourPackage $package)
    {
        if ($request->name_vi == null || $request->price_adult == null || $request->price_child == null ||
            $request->price_disabiliti == null) {
            return redirect('/admin/package/' . $package->id . '/edit')
                ->with('error', 'Một vài trường không được để trống! ');
        }
        $this->serve->updatePackage($request, $package);
        return redirect('admin/package')->with('status', 'Cập nhật gói thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request     $request
     * @param  TourPackage $package
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TourPackage $package)
    {
        $this->serve->destroyPackage($request, $package);
        $request->session()->flash('error', 'Xóa gói thành công!');
    }
}

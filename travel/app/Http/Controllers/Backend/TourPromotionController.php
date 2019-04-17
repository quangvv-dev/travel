<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\TourPromotionService;
use App\Models\Rank;
use App\Models\TourPromotion;
use Illuminate\Http\Request;

class TourPromotionController extends Controller
{
    public $package;

    /**
     * TourController constructor.
     */
    public function __construct(TourPromotionService $tourPromotionService)
    {
        $this->serve = $tourPromotionService;
        $rank = Rank::select('id', 'rank_name_vi')->orderby('id', 'desc')->get();
        view()->share([
            'rank' => $rank,
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
        $tourPromotion = TourPromotion::orderBy('id', 'desc');
        if ($request->search) {
            $tourPromotion = $tourPromotion
                ->where('code', 'like', '%' . $request->search . '%')
                ->orwhere('name', 'like', '%' . $request->search . '%');
        }
        $tourPromotion = $tourPromotion->paginate(10);
        $title = "Quản lý Voucher";
        return view('tour_promotion.index', compact('title', 'tourPromotion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('tour_promotion._form', compact('title'));
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
        $request->validate(
            [
                'code' => 'unique:tour_promotion',
            ],
            $message =
                [
                    'code.unique' => 'Code đã tồn tại!',
                ]
        );
//        dd($request->all());
        $this->serve->create($request);
        return redirect('admin/tour_promotion')->with('status', 'Thêm mới voucher thành công!');
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
    public function edit(TourPromotion $tourPromotion)
    {
        $title = "Sửa";
        return view('tour_promotion._form', compact('title', 'tourPromotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourPromotion $tourPromotion)
    {
        $request->validate(
            [
                'code' => 'unique:tour_promotion,code,' . $tourPromotion->id,
            ],
            $message =
                [
                    'code.unique' => 'Code đã tồn tại!',
                ]
        );
        $this->serve->update($request, $tourPromotion);
        return redirect('admin/tour_promotion')->with('status', 'Cập nhật voucher thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TourPromotion $tourPromotion)
    {
        $this->serve->destroy($tourPromotion);
        $request->session()->flash('error', 'Xóa voucher thành công!');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\RankService;
use App\Models\Rank;
use Illuminate\Http\Request;
use Validator;

class RankController extends Controller
{

    public function __construct(RankService $rankService)
    {
        $this->serve = $rankService;
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
        $title = "Quản lý cấp bậc";
        $rank = Rank::orderBy('id', 'desc');
        if ($request->search) {
            $rank = $rank->where('rank_name_en', 'like', '%' . $request->search . '%')
                ->orwhere('rank_name_vi', 'like', '%' . $request->search . '%')
                ->orwhere('rank_name_th', 'like', '%' . $request->search . '%');
        }
        $rank = $rank->paginate(10);
        return view('rank.index', compact('title', 'rank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('rank._form', compact('title'));
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
        $this->serve->createRank($request);
        return redirect('admin/rank')->with('status', 'Level! ');
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
    public function edit(Rank $rank)
    {
        $title = "Sửa";
        return view('rank._form', compact('title', 'rank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rank $rank)
    {
        $point = str_replace(',', '', $request->point_level);
        $point = str_replace('.', '', $point);
        $request->merge(['point_level' => $point]);
        $validator = Validator::make($request->all(), [
            'image_file' => 'image',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/rank/' . $rank->id . '/edit')->with('error', 'Nhập ảnh không đúng!');
        }
        $this->serve->updateRank($request, $rank);
        return redirect('admin/rank')->with('status', 'Cập nhật thành công level! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rank $rank)
    {
        $this->serve->destroyRank($request, $rank);
        $request->session()->flash('error', 'Xóa level thành công!');
    }
}

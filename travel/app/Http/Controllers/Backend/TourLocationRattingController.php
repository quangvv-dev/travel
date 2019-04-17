<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TourLocationRating;
use Illuminate\Http\Request;

class TourLocationRattingController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $title = "Quản lý đánh giá địa điểm";
        $tourLocationratting = TourLocationRating::where('type', 0)
            ->with('tourLocation', 'user')
            ->orderBy('id', 'desc');
        if ($request->search) {
            $tourLocationratting = $tourLocationratting->whereHas('tourLocation', function ($q) use ($request) {
                $q->where('name_en', 'like', '%' . $request->search . '%')
                    ->orwhere('name_vi', 'like', '%' . $request->search . '%')
                    ->orwhere('name_th', 'like', '%' . $request->search . '%');
            });
        }
        $tourLocationratting = $tourLocationratting->paginate(10);
        return view('tour_location_ratting.index', compact('title', 'tourLocationratting'));
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tour(Request $request)
    {
        $title = "Quản lý đánh giá Tour";
        $tourLocationratting = TourLocationRating::where('type', 1)->with('tour', 'user')->orderBy('id', 'desc');
        if ($request->search) {
            $tourLocationratting = $tourLocationratting->whereHas('tour', function ($q) use ($request) {
                $q->where('tour_name_en', 'like', '%' . $request->search . '%')
                    ->orwhere('tour_name_vi', 'like', '%' . $request->search . '%')
                    ->orwhere('tour_name_th', 'like', '%' . $request->search . '%');
            });
        }
        $tourLocationratting = $tourLocationratting->paginate(10);
        return view('tour_ratting.index', compact('title', 'tourLocationratting'));
    }
}

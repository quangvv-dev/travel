<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Tour;
use App\Models\TourLocation;
use App\Models\UserRank;
use App\Constants\StatusCode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $use = User::all();
        $count_user = count(@$use);
        $tour = Tour::all();
        $count_tour = count(@$tour);
        $location = TourLocation::all();
        $count_location = count(@$location);
        $common = UserRank::where('rank_id', StatusCode::COMMON)->get();
        $silver = UserRank::where('rank_id', StatusCode::SILVER)->get();
        $gold = UserRank::where('rank_id', StatusCode::GOLD)->get();
        $platinum = UserRank::where('rank_id', StatusCode::PLATINUM)->get();
        $diamond = UserRank::where('rank_id', StatusCode::DIAMOND)->get();
        $common = count(@$common);
        $silver = count(@$silver);
        $gold = count(@$gold);
        $platinum = count(@$platinum);
        $diamond = count(@$diamond);
        return view(
            'home',
            compact(
                'count_user',
                'count_tour',
                'count_location',
                'common',
                'silver',
                'gold',
                'platinum',
                'diamond'
            )
        );
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\VideoService;
use App\Models\Video;
use Illuminate\Http\Request;
use Validator;

class VideoController extends Controller
{

    public function __construct(VideoService $videoService)
    {
        $this->serve = $videoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Quản lý video";
        $video = Video::orderBy('id', 'desc');
        if ($request->search) {
            $video = $video->where('name', 'like', '%' . $request->search . '%');
        }
        $video = $video->paginate(10);
        return view('video.index', compact('title', 'video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('video._form', compact('title'));
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
        return redirect('admin/video')->with('status', 'Tạo video mới thành công! ');
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
    public function edit(Video $video)
    {
        $title = "Sửa";
        return view('video._form', compact('title', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $this->serve->update($request, $video);
        return redirect('admin/video')->with('status', 'Update video thành công! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Video $video)
    {
        $this->serve->destroy($request, $video);
        $request->session()->flash('error', 'Xóa video thành công!');
    }
}

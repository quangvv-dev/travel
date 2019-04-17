<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Thumbnail;
use App\Http\Controllers\Controller;
use App\Http\Services\IntroService;
use App\Models\Intro;
use Illuminate\Http\Request;
use Validator;

class IntroController extends Controller
{

    public function __construct(IntroService $introService)
    {
        $this->serve = $introService;
        $lang = [
            'en' => 'English',
            'vi' => 'Vietnamese',
            'th' => 'Thailand',
        ];

        view()->share([
            'lang' => $lang,

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Quản lý ảnh intro";
        $intro = Intro::orderBy('id', 'desc');
        $intro = $intro->paginate(10);
        return view('intro.index', compact('title', 'intro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('intro._form', compact('title'));
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
        $validator = Validator::make($request->all(), [
            'images' => 'required|image',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/intro/create')->with('error', 'Nhập sai định dạng ảnh!');
        }
        $arr = $request->all();
        if ($request->file('images')) {
            $file = $request->images;
            $images = $file->getClientOriginalName();
            $arr['images'] = $images;
            $img = $file->move('uploads/intro', $file->getClientOriginalName());
            $sourcePath = $img->getPath() . '/' . $img->getFilename();
            $thumbPath = $img->getPath() . '/thumb_' . $img->getFilename();
            Thumbnail::generateImageThumbnail($sourcePath, $thumbPath);
        }
        $this->serve->create($arr);

        return redirect('admin/intro')->with('status', 'Thêm mới thành công! ');
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
    public function edit(Intro $intro)
    {
        $title = "Sửa";
        return view('intro._form', compact('title', 'intro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intro $intro)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/intro/create')->with('error', $this->error);
        }
        $arr = $request->all();
        if ($request->file('images')) {
            if (\file_exists(public_path('uploads/intro/' . $intro->images))) {
                unlink('uploads/intro/' . $intro->images);
                unlink('uploads/intro/thumb_' . $intro->images);
            }
            $file = $request->images;
            $images = $file->getClientOriginalName();
            $arr['images'] = $images;
            $img = $file->move('uploads/intro', $file->getClientOriginalName());
            $sourcePath = $img->getPath() . '/' . $img->getFilename();
            $thumbPath = $img->getPath() . '/thumb_' . $img->getFilename();
            Thumbnail::generateImageThumbnail($sourcePath, $thumbPath);
        }
        $this->serve->update($arr, $intro);
        return redirect('admin/intro')->with('status', 'Update thành công! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Intro $intro)
    {
        $this->serve->destroy($intro);
        $request->session()->flash('error', 'Xóa thành công!');
    }
}

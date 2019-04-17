<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryTourService;
use App\Models\CategoryTour;
use Illuminate\Http\Request;
use Validator;

class CategoryTourController extends Controller
{

    public function __construct(CategoryTourService $categoryTourService)
    {
        $this->serve = $categoryTourService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Quản lý danh mục Tour";
        $categoryTour = CategoryTour::orderBy('id', 'desc');
        if ($request->search) {
            $categoryTour = $categoryTour->where('name_en', 'like', '%' . $request->search . '%');
        }
        $categoryTour = $categoryTour->paginate(10);
        return view('category_tour.index', compact('title', 'categoryTour'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm danh mục";
        return view('category_tour._form', compact('title'));
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
            'background' => 'required|image',
        ]);

        if (!$validator->fails()) {
            $this->serve->create($request);
            return redirect('admin/category_tour')->with('status', 'Tạo danh mục thành công!');
        } else {
            return redirect('admin/category_tour/create')->with('error', 'Kiểm tra lại ảnh tải lên!');
        }
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
    public function edit(CategoryTour $categoryTour)
    {
        $title = "Sửa danh mục";
        return view('category_tour._form', compact('title', 'categoryTour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryTour $categoryTour)
    {
        $validator = Validator::make($request->all(), [
            'background' => 'image',
        ]);
        if (!$validator->fails()) {
            $this->serve->update($request, $categoryTour);
            return redirect('admin/category_tour')->with('status', 'Cập nhật danh mục thành công!');
        }
        return redirect('admin/category_tour/create')
            ->with('error', 'Kiểm tra lại ảnh tải lên!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CategoryTour $categoryTour)
    {
        $this->serve->destroy($request, $categoryTour);
        $request->session()->flash('error', 'Xóa danh mục thành công!');
    }
}

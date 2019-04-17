<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\FaqService;
use App\Models\Faq;
use Illuminate\Http\Request;
use Validator;

class FaqController extends Controller
{

    public function __construct(FaqService $faqService)
    {
        $this->serve = $faqService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = "Quản lý chính sách";
        $faq = Faq::orderBy('id', 'desc');
        if ($request->search) {
            $faq = $faq->where('name', 'like', '%' . $request->search . '%');
        }
        $faq = $faq->paginate(10);
        return view('faqs.index', compact('title', 'faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('faqs._form', compact('title'));
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
                'faqs_vi' => 'required',
            ],
            $message =
                [
                    'faqs.required' => 'FAQS không được để trống!',
                ]
        );
        $this->serve->create($request);
        return redirect('admin/faqs')->with('status', 'Tạo video mới thành công! ');
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
    public function edit(Faq $faq)
    {
        $title = "Sửa";
        return view('faqs._form', compact('title', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {

        $request->validate(
            [
                'faqs_vi' => 'required',
            ],
            $message =
                [
                    'faqs_vi.required' => 'FAQs không được để trống!',
                ]
        );
        $this->serve->update($request, $faq);
        return redirect('admin/faqs')->with('status', 'Update video thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faq $faq)
    {
        $this->serve->destroy($faq);
        $request->session()->flash('error', 'Xóa chính sách thành công!');
    }
}

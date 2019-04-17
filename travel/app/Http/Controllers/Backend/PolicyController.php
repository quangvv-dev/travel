<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Services\PolicyService;
use App\Models\Policy;
use Illuminate\Http\Request;
use Validator;

class PolicyController extends Controller
{

    public function __construct(PolicyService $policyService)
    {
        $this->serve = $policyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = "Quản lý chính sách";
        $policy = Policy::orderBy('id', 'desc');
        if ($request->search) {
            $policy = $policy->where('name', 'like', '%' . $request->search . '%');
        }
        $policy = $policy->paginate(10);
        return view('policy.index', compact('title', 'policy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm mới";
        return view('policy._form', compact('title'));
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
                'policy_description_vi' => 'required',
                'name'                  => 'required',
            ],
            $message =
                [
                    'name.required'                  => 'Tên không được để trống',
                    'policy_description_vi.required' => 'Chính sách không được để trống!',
                ]
        );
        $this->serve->create($request);
        return redirect('admin/policy')->with('status', 'Tạo video mới thành công! ');
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
    public function edit(Policy $policy)
    {
        $title = "Sửa";
        return view('policy._form', compact('title', 'policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {

        $request->validate(
            [
                'policy_description_vi' => 'required',
                'name'                  => 'required',
            ],
            $message =
                [
                    'name.required'                  => 'Tên chính sách không được để trống!',
                    'policy_description_vi.required' => 'Chính sách không được để trống!',
                ]
        );
        $this->serve->update($request, $policy);
        return redirect('admin/policy')->with('status', 'Update video thành công! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Policy $policy)
    {
        $this->serve->destroy($policy);
        $request->session()->flash('error', 'Xóa chính sách thành công!');
    }
}

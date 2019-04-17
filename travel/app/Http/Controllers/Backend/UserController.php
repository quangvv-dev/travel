<?php

namespace App\Http\Controllers\Backend;

use App\Constants\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->serve = $userService;
        view()->share([
            'page'   => 'users',
            'gender' => [
                1 => 'Male',
                2 => 'Female',
            ],

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Quản lý người dùng";
        $user = User::orderBy('id', 'desc')->where('role', StatusCode::MEMBER)->with('userRank.rank');
        if ($request->search) {
            $user = $user->where('username', 'like', '%' . $request->search . '%')
                ->orwhere('email', 'like', '%' . $request->search . '%')
                ->orwhere('phone', 'like', '%' . $request->search . '%');
        }
        $user = $user->paginate(10);
        return view('users.index', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm Mới";
        return view('users._form', compact('title'));
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
            'image_file' => 'image',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/users/create')->with('error', 'Only accept image file!');
        }
        $this->serve->createUser($request);
        return redirect('admin/users')->with('status', 'User created successfully!');
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
    public function edit(User $user)
    {
        $name_parent = User::find(@$user->parent_id);
        $title = "Sửa";
        return view('users._form', compact('title', 'user', 'name_parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'image_file' => 'image',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/users/create')->with('error', 'Only accept image file!');
        }
        $this->serve->updateUser($request, $user);
        return redirect('admin/users')->with('status', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  User    $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $this->serve->destroyUser($request, $user);
        $request->session()->flash('error', 'User deleted successfully!');
    }
}

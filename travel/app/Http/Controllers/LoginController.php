<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * function return view
     *
     * @return link
     * */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * function check login
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return link
     * */
    public function postLogin(Request $request)
    {

        $credentials = [
            'email'    => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($credentials) == true) {
            return redirect('admin/home');
        }
        return back()->with('status', 'Email hoặc mật khẩu không chính xác, xin vui lòng thử lại');
    }

    /**
     * function logout user
     *
     * @return link
     * */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Profile page for the logged in user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('users.profile');
    }

    /**
     * Show the user's products
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProducts(User $user)
    {
        return view('users.products', compact('user'));
    }

    /**
     * Update profile
     * 
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'real_name' => 'required|max:255',
            'gender' => 'required'
        ]);

        $user = Auth::user();

        if ($request->input('password') && $request->input('password') == $request->input('confirm_password')) {
            $password = $request->input('password');
            $user->password = bcrypt($password);
            $user->save();
        }
        if ($user->update($request->except('_token', 'password', 'confirm_password'))) {
            return redirect()
                ->back()
                ->with([
                    'status' => 'success',
                    'message' => '资料更新成功'
                ]);
        } else {
            return redirect()
                ->back()
                ->with([
                    'status' => 'error',
                    'message' => '资料更新失败, 请重试'
                ])
                ->withInput($request->except('_token'));
        }
    }

    /**
     * My products
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myProducts()
    {
        $user = Auth::user();

        return view('users.products', compact('user'));
    }
}

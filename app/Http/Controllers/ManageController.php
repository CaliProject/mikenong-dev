<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    /**
     * Index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $title = "管理首页";

        return view('manage.index', compact('title'));
    }

    /**
     * Display and fetch all products
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProducts()
    {
        $title = "产品管理";

        return view('manage.product.index', compact('title'));
    }

    /**
     * Display and fetch all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategories()
    {
        $title = "分类管理";

        return view('manage.category.index', compact('title'));
    }

    /**
     * Display and fetch all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUsers()
    {
        $title = "用户管理";

        return view('manage.user.index', compact('title'));
    }
}

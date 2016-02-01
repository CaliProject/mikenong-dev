<?php

namespace App\Http\Controllers;

use App\Category;
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
        $categories = Category::all();

        return view('manage.category.index', compact('title', 'categories'));
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

    /**
     * Display the page for adding a category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCategory()
    {
        $title = "新增分类";
        $categories = Category::superCategories()->get();

        return view('manage.category.add', compact('title', 'categories'));
    }

    /**
     * Save a new category with POST request
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function saveNewCategory(Request $request)
    {
        if (trim($request->input('name')) == "") {
            return redirect()
                ->back()
                ->with(['status' => 'error', 'message' => '请填写分类名称'])
                ->withInput($request->except('_token'));
        }

        $category = Category::create($request->except('_token'));

        return $category ? redirect('/manage/categories')->with(['status' => 'success', 'message' => '分类创建成功!']) : redirect()
            ->back()
            ->with(['status' => 'error', 'message' => '创建失败, 请重试'])
            ->withInput($request->except('_token'));
    }
}

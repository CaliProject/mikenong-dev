<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
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
     * Display view and fetch all products
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProducts()
    {
        $products = Product::alphabetically();

        return view('manage.product.index', compact('products'));
    }

    /**
     * Display view for adding a product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addProduct()
    {
        return view('manage.product.add');
    }

    public function saveNewProduct(Request $request)
    {

    }

    /**
     * Display and fetch all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategories()
    {
        $categories = Category::superCategories()->get();

        return view('manage.category.index', compact('categories'));
    }

    /**
     * Display the edit page by the given category
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editCategory(Category $category)
    {
        $categories = Category::superCategories()->get();
        return view('manage.category.edit', compact('category', 'categories'));
    }


    /**
     * Update a category
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCategory(Request $request, Category $category)
    {
        $category->update($request->except('_token'));
        return $category ? redirect()
            ->back()
            ->with([
                'status' => 'success',
                'message' => '分类已更新'
            ]) : redirect()
            ->back()
            ->with([
                'status' => 'error',
                'message' => '分类更新失败, 请重试'
            ]);
    }

    /**
     * Delete a category
     *
     * @param Category $category
     * @return array
     * @throws \Exception
     */
    public function deleteCategory(Category $category)
    {
        $ids = Category::where('parent_id', '=', $category->id)->get()->lists('id')->toArray();

        Category::destroy($ids);

        return $category->delete() ? ["status" => "success", "message" => "分类删除成功"] : ["status" => "error", "message" => "分类删除失败, 请重试"];
    }

    /**
     * Display and fetch all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUsers()
    {
        $users = User::alphabetically();

        return view('manage.user.index', compact('users'));
    }

    /**
     * Display and edit the user
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUser(User $user)
    {
        return view('manage.user.edit', compact('user'));
    }

    /**
     * Update a user
     *
     * @param Request $request
     * @param User $user
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $request, User $user)
    {
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
     * Delete a user
     *
     * @param User $user
     * @return array|json
     * @throws \Exception
     */
    public function deleteUser(User $user)
    {
        $name = $user->name;
        if ($user->delete()) {
            return [
                    'status' => 'success',
                    'message' => '成功删除用户: ' . $name
                ];
        } else {
            return [
                    'status' => 'error',
                    'message' => '删除用户失败: ' . $name
                ];
        }
    }
    /**
     * Search users by a query string
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchUsers(Request $request)
    {
        $keyword = $request->input('keyword');
        $users = User::search($keyword);
        $users->setPath('/manage/users/search/'.$keyword);

        return view('manage.user.index', compact('users', 'keyword'));
    }

    /**
     * Search users by url
     *
     * @param $keyword
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchUsersURL($keyword)
    {
        $users = User::search($keyword);

        return view('manage.user.index', compact('users', 'keyword'));
    }

    /**
     * Display the page for adding a category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCategory()
    {
        $categories = Category::superCategories()->get();

        return view('manage.category.add', compact('categories'));
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

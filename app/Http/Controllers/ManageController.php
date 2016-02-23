<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateProductRequest;
use App\Page;
use App\Product;
use App\ProductView;
use App\SiteConfiguration;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class ManageController extends Controller
{
    /**
     * Index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $productsCount = Product::all()->count();
        $categoriesCount = Category::all()->count();
        $usersCount = User::all()->count();

        return view('manage.index', compact('productsCount', 'categoriesCount', 'usersCount'));
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

    /**
     * Save a new product from a POST request
     *
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveNewProduct(CreateProductRequest $request)
    {
        $product = Product::create($request->except('_token', 'editorValue'));
        $product->description = $request->input("editorValue");
        $product->user_id = $request->user()->id;

        $views = new ProductView;
        $views->product_id = $product->id;
        $views->save();

        return $product->save() ? redirect('/manage/products')->with([
            'status' => 'success',
            'message' => '产品创建成功'
        ]) : redirect()->back()->with([
            'status' => 'error',
            'message' => '产品创建失败, 请重试'
        ]);
    }

    /**
     * Display view for editing a given product
     *
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editProduct(Product $product)
    {
        return view('manage.product.edit', compact('product'));
    }

    /**
     * Update a product with a POST request
     *
     * @param CreateProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProduct(CreateProductRequest $request, Product $product)
    {
        $product->update($request->except(['_token','editorValue']));
        $product->description = $request->input("editorValue");

        return $product->save() ? redirect()->back()->with([
            'status' => 'success',
            'message' => '产品更新成功'
        ]) : redirect()->back()->with([
            'status' => 'error',
            'message' => '产品更新失败, 请重试'
        ]);
    }

    /**
     * Delete a product
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteProduct(Product $product)
    {
        return $product->delete() ? [
            'status' => 'success',
            'message' => '成功删除产品'
        ] : [
            'status' => 'error',
            'message' => '删除失败, 请重试'
        ];
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
     * Search products by a query string
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::search($keyword)->paginate(35);
        $products->setPath('/manage/products/search/'.$keyword);

        return view('manage.product.index', compact('products', 'keyword'));
    }

    /**
     * Search products by url
     *
     * @param $keyword
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchProductsURL($keyword)
    {
        $products = Product::search($keyword)->paginate(35);

        return view('manage.product.index', compact('products', 'keyword'));
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
     * Display site configurations page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSiteConfigs()
    {
        return view('manage.site.index');
    }

    /**
     * Save configurations with POST request
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveSiteConfigs(Request $request)
    {
        SiteConfiguration::saveValues($request);
        return redirect()->back()->with([
            'status' => 'success',
            'message' => '站点信息更新成功'
        ]);
    }

    /**
     * Database migration
     *
     * @return mixed
     */
    public function migrate()
    {
        return Artisan::call('migrate');
    }

    /**
     * Database rollback
     *
     * @return mixed
     */
    public function rollback()
    {
        return Artisan::call('migrate:rollback');
    }

    /**
     * Show all pages
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPages()
    {
        $pages = Page::all();

        return view('manage.page.all', compact('pages'));
    }

    /**
     * Show create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createPage()
    {
        return view('manage.page.add', ["page" => new Page]);
    }

    /**
     * Create a new page
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveNewPage(Request $request)
    {
        $page = Page::create($request->all());

        $page->update(["content" => $request->input('editorValue')]);

        return redirect('manage/pages')->with(['status' => 'success', 'message' => '创建成功']);
    }

    /**
     * Show the edit page
     *
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage(Page $page)
    {
        return view('manage.page.edit', compact('page'));
    }

    /**
     * Save a page
     *
     * @param Request $request
     * @param Page $page
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function savePage(Request $request, Page $page)
    {
        $page->update($request->all());
        $page->content = $request->input("editorValue");
        $page->save();

        return  redirect()->back()->with(['status' => 'success', 'message' => '更新成功']);
    }

    /**
     * Deletes a page
     *
     * @param Page $page
     * @return array
     * @throws \Exception
     */
    public function deletePage(Page $page)
    {
        return $page->delete() ? ['status' => 'success', 'message' => '成功删除'] : ['status' => "error", 'message' => '删除失败'];
    }
}

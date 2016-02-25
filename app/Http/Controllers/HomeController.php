<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Page;
use App\Pricing;
use App\Product;
use App\User;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::stickyFirst()->latest()->paginate(35);
        $pages = Page::latest()->take(5)->get();

        return view('home', compact('products', 'pages'));
    }

    /**
     * Search products
     *
     * @param $keyword
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchProducts($keyword)
    {
        $products = Product::search($keyword)->paginate(35);

        return view('products.search', compact('keyword', 'products'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategory(Category $category)
    {
        $status = 'all';
        $products = $category->pagedProducts();
        return view('categories.show', compact('category', 'products', 'status'));
    }

    /**
     * Show all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllCategories()
    {
        $products = Product::paginate(35);
        $category = null;

        return view('categories.show', compact('products', 'category'));
    }

    /**
     * @param Category $category
     * @param $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategoryWithStatus(Category $category, $status)
    {
        $products = Product::sortedCategoryAndStatus($category, $status);
        return view('categories.show', compact('category', 'products' ,'status'));
    }

    /**
     * Show all cooperatives
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCooperatives()
    {
        $cooperatives = User::cooperatives()->hot()->paginate();

        return view('users.cooperatives', compact("cooperatives"));
    }

    /**
     * Show pricing
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPricing()
    {
        $pricings = Pricing::paginate(50);

        return view('pricing.index', compact('pricings'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreatePricing()
    {
        return view('manage.pricing.add');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function createPricing(Request $request)
    {
        $this->validate($request, [
            "max_price" => "required|numeric",
            "min_price" => "required|numeric",
            "avg_price" => "required|numeric",
            "market" => "required",
            "category" => "required"
        ], [], [
            "max_price" => "最高价格",
            "min_price" => "最低价格",
            "avg_price" => "平均价格",
            "market" => "农产品名称",
            "category" => "种类"
        ]);
        return Pricing::create($request->all()) ? redirect('pricing')->with(['status' => 'success', 'message' => "更新成功"]) : redirect()->back()->withInput($request->all());
    }

    /**
     * Show page for editing a pricing
     *
     * @param Pricing $pricing
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEditPricing(Pricing $pricing)
    {
        return view('manage.pricing.edit', compact('pricing'));
    }

    /**
     * Update a pricing
     *
     * @param Request $request
     * @param Pricing $pricing
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function updatePricing(Request $request, Pricing $pricing)
    {
        $this->validate($request, [
            "max_price" => "required|numeric",
            "min_price" => "required|numeric",
            "avg_price" => "required|numeric",
            "market" => "required",
            "category" => "required"
        ], [], [
            "max_price" => "最高价格",
            "min_price" => "最低价格",
            "avg_price" => "平均价格",
            "market" => "农产品名称",
            "category" => "种类"
        ]);
        return $pricing->update($request->all()) ? redirect('pricing')->with(['status' => 'success', 'message' => "更新成功"]) : redirect()->back()->withInput($request->all());
    }

    /**
     * Deletes a pricing
     *
     * @param Pricing $pricing
     * @return array
     * @throws \Exception
     */
    public function deletePricing(Pricing $pricing)
    {
        return $pricing->delete() ? ["status" => "success", "message" => "删除成功"] : ["status" => "error", "message" => "删除失败"];
    }

    /**
     * Show about page
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAboutPage()
    {
        $about = DB::table('about')->first();
        
        return view('about', compact('about'));
    }
}

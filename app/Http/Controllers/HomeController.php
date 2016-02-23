<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;

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

        return view('home', compact('products'));
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
}

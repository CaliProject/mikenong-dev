<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display front-page for creating a product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $title = "创建产品";

        return view('products.create', compact('title'));
    }

    /**
     * Display details for the given product
     *
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productDetails(Product $product)
    {
        return view('products.details', compact('product'));
    }
}

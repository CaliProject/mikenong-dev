<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
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
     * Upload images
     *
     * @param Request $request
     * @return array
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp,gif'
        ]);

        $file = $request->file('photo');

        $name = time() . $file->getClientOriginalName();

        $file->move('products/uploads/photos', $name);

        return ['status' => 'ok', 'url' => $file->getClientOriginalName()];
    }

    /**
     * Save a new product for members
     *
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveNewProduct(CreateProductRequest $request)
    {
        $product = Product::create($request->except('_token', 'editorValue'));
        $product->description = $request->input("editorValue");
        $product->user_id = $request->user()->id;

        return $product->save() ? redirect('/')->with([
            'status' => 'success',
            'message' => '产品创建成功'
        ]) : redirect()->back()->with([
            'status' => 'error',
            'message' => '产品创建失败, 请重试'
        ]);
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

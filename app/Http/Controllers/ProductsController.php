<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //
    public function create()
    {
        $title = "创建产品";

        return view('products.create', compact('title'));
    }
}

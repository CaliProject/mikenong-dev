<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "主页";

        return view('home', compact('title'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index($slug)
    {
        return view('pages.detail_product', compact(['slug']));
    }
}

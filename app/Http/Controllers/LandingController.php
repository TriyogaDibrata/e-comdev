<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::with(['unit', 'media' => function ($query) {
            $query->take(1);
        }])->get();
        return view('pages.landing', compact(['products']));
    }
}

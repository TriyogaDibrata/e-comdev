<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index($ticket)
    {
        return view('pages.detail_order', compact(['ticket']));
    }
}

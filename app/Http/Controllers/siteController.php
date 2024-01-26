<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class siteController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('site.index', compact('products'));
    }


}

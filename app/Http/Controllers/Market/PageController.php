<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('market.index');
    }

    public function catalog(): View
    {
        $products = Product::all();

        $products->load('brand', 'category');

        return view('market.catalog', compact('products'));
    }

    public function cart(): View
    {
        return view('market.cart');
    }
}

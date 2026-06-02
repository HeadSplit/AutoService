<?php

namespace App\Http\Controllers\market;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
       $products = Product::inRandomOrder()->with('brand', 'category')->take(4)->get();
        return view('market.index', compact('products'));
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

    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('market.show', compact('product'));
    }

    public function showBrand(string $slug)
    {
        $brand = Brand::with('products.category')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('market.brand', compact('brand'));
    }

    public function showCategory(string $slug)
    {
        $category = Category::with('products.brand')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('market.category', compact('category'));
    }

    public function showBrands()
    {
        $brands = Brand::with('products.category')->get();

        return view('market.brands', compact('brands'));
    }

    public function showCategories()
    {
        $categories = Category::all();

        return view('market.categories', compact('categories'));
    }
}

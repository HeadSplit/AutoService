<?php

namespace App\Http\Controllers\market;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = CartService::get();

        $products = Product::whereIn('id', array_keys($cart))
            ->get()
            ->map(function ($product) use ($cart) {
                $product->cart_qty = $cart[$product->id];
                return $product;
            });

        $total = $products->sum(fn ($p) => $p->price * $p->cart_qty);

        return view('market.cart.index', compact('products', 'total'));
    }

    public function add(Request $request, $id)
    {
        CartService::add($id, $request->input('quantity', 1));

        return back();
    }

    public function update(Request $request, $id)
    {
        CartService::update($id, (int)$request->quantity);

        return back();
    }

    public function remove($id)
    {
        CartService::remove($id);

        return back();
    }

    public function clear()
    {
        CartService::clear();

        return back();
    }
}

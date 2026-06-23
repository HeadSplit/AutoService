<?php

namespace App\Http\Controllers\market;

use App\Http\Controllers\Controller;
use App\Models\Custom;
use App\Models\CustomItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomController extends Controller
{
    public function index()
    {
        $customs = Custom::latest()->paginate(15);
        return view('market.custom.index', compact('customs'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $cart = CartService::get();

        if (empty($cart)) {
            return back()->with('error', 'Корзина пуста');
        }

        DB::transaction(function () use ($user, $cart) {

            $order = Custom::create([
                'user_id' => $user->id,
                'total' => 0,
            ]);

            $total = 0;

            foreach ($cart as $productId => $qty) {

                $product = Product::find($productId);

                if (!$product) {
                    continue;
                }

                $price = $product->price;

                CustomItem::create([
                    'custom_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price' => $price,
                ]);

                $total += $price * $qty;
            }

            $order->update([
                'total' => $total
            ]);

            CartService::clear();
        });

        return redirect()->route('lk')
            ->with('success', 'Заказ успешно оформлен');
    }

    public function show(string $id)
    {
        $order = Custom::with('items.product')->findOrFail($id);

        return view('market.custom.show', compact('order'));
    }

    public function edit(Custom $custom)
    {
        $custom->load('items.product');

        return view('market.custom.edit', compact('custom'));
    }

    public function update(Request $request, string $id)
    {
        $order = Custom::findOrFail($id);

        $data = $request->validate([
            'status' => ['required', 'in:new,in_progress,completed']
        ]);

        $order->update($data);

        return redirect()
            ->route('custom.show', $order->id)
            ->with('success', 'Заказ обновлён');
    }

    public function destroy(Custom $custom)
    {
        $custom->delete();

        return redirect()
            ->route('custom.index')
            ->with('success', 'Заказ удален');
    }
}

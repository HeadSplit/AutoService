<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class CartService
{
    public static function key()
    {
        return 'cart:user_' . auth()->id();
    }

    public static function get()
    {
        return json_decode(Redis::get(self::key()), true) ?? [];
    }

    public static function save($cart)
    {
        Redis::set(self::key(), json_encode($cart));
    }

    public static function add($id, $qty = 1)
    {
        $cart = self::get();

        $cart[$id] = ($cart[$id] ?? 0) + $qty;

        self::save($cart);
    }

    public static function update($id, $qty)
    {
        $cart = self::get();

        if ($qty <= 0) {
            unset($cart[$id]);
        } else {
            $cart[$id] = $qty;
        }

        self::save($cart);
    }

    public static function remove($id)
    {
        $cart = self::get();
        unset($cart[$id]);
        self::save($cart);
    }

    public static function clear()
    {
        Redis::del(self::key());
    }

    public static function count()
    {
        return array_sum(self::get());
    }
}

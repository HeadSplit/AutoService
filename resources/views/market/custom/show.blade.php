@extends('layouts.market.index')

@section('title', 'Заказ #' . $order->id)

@section('main')

    <section class="max-w-6xl mx-auto px-6 py-20">

        <div class="mb-10">

            <h1 class="text-4xl font-bold text-white">
                Заказ #{{ $order->id }}
            </h1>

            <p class="text-gray-400 mt-2">
                Статус: {{ $order->status }}
            </p>

            <p class="text-amber-400 font-bold mt-2">
                Итого: {{ number_format($order->total, 0, ',', ' ') }} ₽
            </p>

        </div>

        <h2 class="text-2xl font-semibold text-white mb-6">
            Товары в заказе
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($order->items as $item)

                <div class="bg-white/10 border border-white/10 rounded-3xl overflow-hidden">

                    <div class="p-5">

                        <div class="text-white font-semibold">
                            {{ $item->product->name ?? 'Удалённый товар' }}
                        </div>

                        <div class="text-gray-400 text-sm mt-2">
                            Кол-во: {{ $item->quantity }}
                        </div>

                        <div class="text-amber-400 font-bold mt-3">
                            {{ number_format($item->price * $item->quantity, 0, ',', ' ') }} ₽
                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

@endsection

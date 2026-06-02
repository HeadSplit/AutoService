@extends('layouts.market.index')

@section('title', 'Корзина')

@section('main')

    <section class="max-w-5xl mx-auto px-6 py-16">

        <h1 class="text-4xl font-bold text-white mb-10">
            Корзина
        </h1>

        @if(count($products))

            <div class="space-y-5">

                @foreach($products as $product)

                    <div class="bg-white/5 border border-white/10 rounded-3xl p-6 flex items-center justify-between">

                        <div class="flex items-center gap-5">

                            <img src="{{ asset('storage/' . $product->image) }}"
                                 class="w-20 h-20 rounded-2xl object-cover">

                            <div>

                                <h2 class="text-white font-semibold text-lg">
                                    {{ $product->name }}
                                </h2>

                                <p class="text-gray-400">
                                    {{ number_format($product->price, 0, ',', ' ') }} ₽
                                </p>

                            </div>

                        </div>

                        {{-- QUANTITY --}}
                        <form method="POST" action="{{ route('cart.update', $product->id) }}"
                              class="flex items-center gap-3">

                            @csrf

                            <input type="number"
                                   name="quantity"
                                   value="{{ $product->cart_qty }}"
                                   class="w-20 bg-black/60 border border-white/20 rounded-xl text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">

                            <button class="px-4 py-2 bg-amber-500 text-black rounded-xl">
                                OK
                            </button>

                        </form>

                        {{-- REMOVE --}}
                        <form method="POST" action="{{ route('cart.remove', $product->id) }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-400 hover:text-red-300">
                                удалить
                            </button>
                        </form>

                    </div>

                @endforeach

            </div>

            {{-- TOTAL --}}
            {{-- TOTAL --}}
            <form method="POST" action="{{ route('cart.store') }}"
                  class="mt-10 bg-white/5 border border-white/10 rounded-3xl p-6">

                @csrf

                <div class="flex items-center justify-between">

                    <div class="text-white text-xl">
                        Итого:
                    </div>

                    <div class="text-amber-400 text-2xl font-bold">
                        {{ number_format($total, 0, ',', ' ') }} ₽
                    </div>

                </div>

                {{-- OPTIONAL INFO --}}


                <button type="submit"
                        class="w-full mt-6 py-3 bg-amber-500 text-black rounded-xl font-bold hover:scale-[1.02] transition">

                    Оформить заказ

                </button>

            </form>

        @else

            <div class="bg-white/5 border border-white/10 rounded-3xl p-10 text-center text-gray-400">
                Корзина пуста
            </div>

        @endif

    </section>

@endsection

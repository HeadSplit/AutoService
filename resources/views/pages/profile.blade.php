@extends('layouts.index')

@section('main')

    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid lg:grid-cols-3 gap-8">

            {{-- Профиль --}}
            <div class="lg:col-span-1">

                <div class="bg-[#111] border border-white/10 rounded-3xl p-8">

                    <div class="flex flex-col items-center">

                        <img
                            src="{{ $user->image ?? asset('images/default-avatar.png') }}"
                            alt="avatar"
                            class="w-52 h-52 rounded-full object-cover border-4 border-amber-500/30">

                        <h2 class="mt-6 text-2xl font-semibold">
                            {{ auth()->user()->name }}
                        </h2>

                        <p class="text-gray-500 mt-2">
                            {{ auth()->user()->email }}
                        </p>

                    </div>

                    <form
                        action="{{ route('upload') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="mt-8">

                        @csrf

                        <label class="block text-sm text-gray-400 mb-3">
                            Новая фотография
                        </label>

                        <input
                            type="file"
                            name="avatar"
                            accept="image/*"
                            class="block w-full text-sm text-gray-400
                        file:mr-4
                        file:py-3
                        file:px-4
                        file:rounded-xl
                        file:border-0
                        file:bg-amber-500
                        file:text-black
                        file:font-medium">

                        <button
                            type="submit"
                            class="w-full mt-4 py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-[1.02] transition">

                            Загрузить фото

                        </button>

                    </form>

                    <form
                        action="{{ route('deleteImage') }}"
                        method="POST"
                        class="mt-3">

                        @csrf

                        <button
                            type="submit"
                            class="w-full py-3 rounded-xl border border-red-500/30 text-red-400 hover:bg-red-500/10 transition">

                            Удалить фото

                        </button>

                    </form>

                </div>

            </div>

            {{-- Заказы --}}
            <div class="lg:col-span-2">

                {{-- СТО заказы --}}
                <div class="flex items-center justify-between mb-8">

                    <h1 class="text-3xl font-bold text-white">
                        Мои заказы (СТО)
                    </h1>

                    <span class="text-gray-500">
            {{ count($orders) }} заказов
        </span>

                </div>

                @if(count($orders))

                    <div class="grid md:grid-cols-2 gap-6 mb-12">

                        @foreach($orders as $order)

                            <div class="bg-[#111] border border-white/10 rounded-3xl overflow-hidden hover:border-amber-500/30 transition">

                                <img
                                    src="{{ $order->image }}"
                                    alt=""
                                    class="w-full h-52 object-cover">

                                <div class="p-6">

                                    <h3 class="text-xl font-semibold mb-3 text-white">
                                        {{ $order->mark }} {{ $order->model }}
                                    </h3>

                                    <p class="text-gray-500 mb-6">
                                        {{ $order->description }}
                                    </p>

                                    <a href="{{ route('show-order', [$order->uuid]) }}"
                                       class="inline-flex items-center px-5 py-3 bg-amber-500 text-black rounded-xl font-medium">

                                        Подробнее

                                    </a>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="bg-[#111] border border-white/10 rounded-3xl p-8 text-center mb-12">

                        <h2 class="text-xl font-semibold text-white mb-2">
                            СТО заказов нет
                        </h2>

                        <p class="text-gray-500">
                            Вы ещё не оставляли заявки на обслуживание
                        </p>

                    </div>

                @endif


                {{-- МАРКЕТ ЗАКАЗЫ --}}
                <div class="flex items-center justify-between mb-8">

                    <h1 class="text-3xl font-bold text-white">
                        Мои заказы (Магазин)
                    </h1>

                    <span class="text-gray-500">
            {{ count($marketOrders) }} заказов
        </span>

                </div>

                @if(count($marketOrders))

                    <div class="grid md:grid-cols-2 gap-6">

                        @foreach($marketOrders as $order)

                            <div class="bg-[#111] border border-white/10 rounded-3xl p-6 hover:border-amber-500/30 transition">

                                <div class="mb-4">

                                    <h3 class="text-xl font-semibold text-white">
                                        Заказ #{{ $order->id }}
                                    </h3>

                                    <p class="text-gray-500 text-sm mt-1">
                                        Статус: {{ $order->status }}
                                    </p>

                                </div>

                                <div class="text-sm text-gray-400 space-y-1 mb-5">

                                    <div>
                                        Товаров: {{ $order->items->count() }}
                                    </div>

                                    <div>
                                        Сумма: {{ number_format($order->total, 0, ',', ' ') }} ₽
                                    </div>

                                </div>

                                <a href="{{route('custom.show', $order->id)}}"
                                   class="inline-flex items-center px-5 py-3 bg-amber-500 text-black rounded-xl font-medium">

                                    Подробнее

                                </a>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="bg-[#111] border border-white/10 rounded-3xl p-8 text-center">

                        <h2 class="text-xl font-semibold text-white mb-2">
                            Маркет заказов нет
                        </h2>

                        <p class="text-gray-500">
                            Вы ещё не оформляли покупки в магазине
                        </p>

                    </div>

                @endif

            </div>

@endsection

@extends('layouts.market.index')

@section('title', $category->name)

@section('main')

    <section class="max-w-7xl mx-auto px-6 py-16">

        {{-- HEADER --}}
        <div class="mb-12">

            <div class="inline-flex px-4 py-2 rounded-full bg-amber-500/10 text-amber-400 text-sm mb-4">
                Категория
            </div>

            <h1 class="text-5xl font-extrabold text-white">
                {{ $category->name }}
            </h1>

            <p class="text-gray-400 text-lg mt-3">
                {{ $category->description }}
            </p>

            <div class="mt-4 text-gray-300">
                Товаров в категории: {{ $category->products->count() }}
            </div>

        </div>

        {{-- PRODUCTS --}}
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-white">
                Товары категории
            </h2>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @forelse($category->products as $product)

                <div class="bg-white/10 border border-white/10 rounded-3xl overflow-hidden hover:border-amber-500 transition flex flex-col">

                    {{-- IMAGE --}}
                    <a href="{{ route('market.catalog.product', $product->slug) }}">

                        <div class="h-56 bg-white p-4 flex items-center justify-center">

                            @if($product->image)

                                <img src="{{ asset('storage/' . $product->image) }}"
                                     class="max-w-full max-h-full object-contain"
                                     alt="{{ $product->name }}">

                            @else

                                <div class="text-gray-500">
                                    Нет изображения
                                </div>

                            @endif

                        </div>

                    </a>

                    {{-- BODY --}}
                    <div class="p-5 flex flex-col flex-grow">

                        <a href="{{ route('market.catalog.product', $product->slug) }}">

                            <h3 class="text-lg font-bold text-white hover:text-amber-400 transition">
                                {{ $product->name }}
                            </h3>

                        </a>

                        <div class="mt-3">

                            @if($product->brand)
                                <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200 text-xs">
                                {{ $product->brand->name }}
                            </span>
                            @endif

                        </div>

                        <div class="mt-4 text-sm text-gray-300">

                            Артикул:
                            <span class="text-white font-semibold">
                            {{ $product->article }}
                        </span>

                        </div>

                        <div class="mt-3">

                            @if($product->quantity > 0)

                                <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-300 text-sm">
                                В наличии: {{ $product->quantity }}
                            </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-red-500/10 text-red-300 text-sm">
                                Нет в наличии
                            </span>

                            @endif

                        </div>

                        <div class="mt-5 text-3xl font-extrabold text-amber-400">
                            {{ number_format($product->price, 0, ',', ' ') }} ₽
                        </div>

                        <div class="mt-auto pt-5">

                            <a href="{{ route('market.catalog.product', $product->slug) }}"
                               class="block text-center py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-[1.02] transition">

                                Подробнее

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full">

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-12 text-center">

                        <h3 class="text-2xl text-white mb-3">
                            В этой категории пока нет товаров
                        </h3>

                        <p class="text-gray-400">
                            Добавьте товары в категорию.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </section>

@endsection

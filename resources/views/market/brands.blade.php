@extends('layouts.market.index')

@section('title', 'Бренды')

@section('main')

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="mb-12">

            <h1 class="text-5xl font-extrabold text-white">
                Бренды
            </h1>

            <p class="text-gray-300 text-lg mt-3">
                Выберите бренд и посмотрите товары
            </p>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @forelse($brands as $brand)

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6 flex flex-col hover:border-amber-500 transition">

                    <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center text-2xl text-gray-300 mb-4">
                        🏷️
                    </div>

                    <h2 class="text-xl font-bold text-white">
                        {{ $brand->name }}
                    </h2>

                    @if($brand->country)
                        <p class="text-gray-400 mt-1">
                            {{ $brand->country }}
                        </p>
                    @endif

                    <div class="flex flex-wrap gap-2 mt-4">

                    <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-xs">
                        {{ $brand->slug }}
                    </span>

                        @if(isset($brand->products_count))
                            <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 text-xs">
                            Товаров: {{ $brand->products_count }}
                        </span>
                        @endif

                    </div>

                    <div class="mt-auto pt-6">

                        <a href="{{ route('brand.show', $brand->slug) }}"
                           class="w-full block text-center py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-[1.02] transition">

                            Просмотреть товары

                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full bg-white/10 border border-white/10 rounded-3xl p-12 text-center">

                    <h3 class="text-2xl text-white mb-3">
                        Брендов пока нет
                    </h3>

                    <p class="text-gray-400">
                        Попробуйте позже
                    </p>

                </div>

            @endforelse

        </div>

    </section>

@endsection

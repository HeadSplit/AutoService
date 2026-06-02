@extends('layouts.market.index')

@section('title', 'Товары')

@section('main')

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">

            <div>

                <h1 class="text-4xl font-bold text-white">
                    Товары
                </h1>

                <p class="text-gray-400 mt-2">
                    Управление товарами магазина
                </p>

            </div>

            <a href="{{ route('market.admin.products.create') }}"
               class="px-5 py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-105 transition">

                Добавить товар

            </a>

        </div>

        <div class="space-y-6">

            @forelse($products as $product)

                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 hover:border-amber-500 transition">

                    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">

                        {{-- LEFT SIDE --}}
                        <div class="flex flex-col md:flex-row gap-6 flex-1">

                            {{-- IMAGE --}}
                            @if($product->image)

                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full md:w-56 h-56 rounded-3xl object-cover shrink-0 border border-white/10">

                            @else

                                <div class="w-full md:w-56 h-56 rounded-3xl bg-white/10 flex items-center justify-center text-gray-500 shrink-0 border border-white/10">

                                    Нет фото

                                </div>

                            @endif

                            {{-- INFO --}}
                            <div class="flex-1">

                                <div class="flex flex-wrap items-center gap-3 mb-3">

                                    @if($product->brand)
                                        <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-sm">
                                            {{ $product->brand->name }}
                                        </span>
                                    @endif

                                    @if($product->category)
                                        <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-sm">
                                            {{ $product->category->name }}
                                        </span>
                                    @endif

                                </div>

                                <h2 class="text-3xl font-bold text-white">

                                    {{ $product->name }}

                                </h2>

                                <p class="text-gray-400 mt-4 leading-relaxed">

                                    {{ Str::limit($product->description, 250) }}

                                </p>

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">

                                    <div class="bg-black/20 border border-white/10 rounded-2xl p-4">

                                        <div class="text-gray-500 text-sm">
                                            Цена
                                        </div>

                                        <div class="text-2xl font-bold text-amber-400 mt-1">
                                            {{ number_format($product->price, 0, ',', ' ') }} ₽
                                        </div>

                                    </div>

                                    <div class="bg-black/20 border border-white/10 rounded-2xl p-4">

                                        <div class="text-gray-500 text-sm">
                                            Артикул
                                        </div>

                                        <div class="text-white font-semibold mt-1">
                                            {{ $product->article }}
                                        </div>

                                    </div>

                                    <div class="bg-black/20 border border-white/10 rounded-2xl p-4">

                                        <div class="text-gray-500 text-sm">
                                            Остаток
                                        </div>

                                        <div class="text-green-400 font-semibold mt-1">
                                            {{ $product->quantity }} шт.
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- ACTIONS --}}
                        <div class="flex flex-col gap-3 min-w-[180px]">

                            <a href="{{ route('market.catalog.product', $product->slug) }}"
                               class="px-4 py-3 rounded-xl border border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white transition text-center">

                                Просмотреть

                            </a>

                            <a href="{{ route('market.admin.products.edit', $product->id) }}"
                               class="px-4 py-3 rounded-xl border border-amber-500 text-amber-400 hover:bg-amber-500 hover:text-black transition text-center">

                                Изменить

                            </a>

                            <form action="{{ route('market.admin.products.destroy', $product->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Удалить товар?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full px-4 py-3 rounded-xl border border-red-500 text-red-400 hover:bg-red-500 hover:text-white transition">

                                    Удалить

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white/5 border border-white/10 rounded-3xl p-12 text-center">

                    <h3 class="text-3xl text-white mb-3">
                        Товаров пока нет
                    </h3>

                    <p class="text-gray-400">
                        Добавьте первый товар в каталог.
                    </p>

                </div>

            @endforelse

        </div>

    </section>

@endsection

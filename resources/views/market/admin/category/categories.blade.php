@extends('layouts.market.index')

@section('title', 'Категории')

@section('main')

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-4xl font-bold text-white">
                    Категории
                </h1>

                <p class="text-gray-400 mt-2">
                    Управление категориями магазина
                </p>

            </div>

            <a href="{{ route('market.admin.categories.create') }}"
               class="px-5 py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-105 transition">

                Добавить категорию

            </a>

        </div>

        <div class="space-y-6">

            @forelse($categories as $category)

                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 hover:border-amber-500 transition">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        {{-- LEFT --}}
                        <div class="flex items-center gap-6">

                            {{-- ICON --}}
                            <div class="w-20 h-20 rounded-2xl bg-white/10 flex items-center justify-center text-2xl text-gray-300">
                                📦
                            </div>

                            <div>

                                <h2 class="text-xl font-semibold text-white">
                                    {{ $category->name }}
                                </h2>

                                <p class="text-gray-400 mt-2">
                                    {{ $category->description }}
                                </p>

                                <div class="flex flex-wrap gap-3 mt-4">

                                <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-sm">
                                    {{ $category->slug }}
                                </span>

                                    @if($category->products_count ?? false)
                                        <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 text-sm">
                                        Товаров: {{ $category->products_count }}
                                    </span>
                                    @endif

                                </div>

                            </div>

                        </div>

                        {{-- ACTIONS --}}
                        <div class="flex flex-wrap gap-3">

                            <a href="{{ route('market.admin.categories.show', $category->id) }}"
                               class="px-4 py-2 rounded-xl border border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white transition">

                                Просмотреть

                            </a>

                            <a href="{{ route('market.admin.categories.edit', $category->id) }}"
                               class="px-4 py-2 rounded-xl border border-amber-500 text-amber-400 hover:bg-amber-500 hover:text-black transition">

                                Изменить

                            </a>

                            <form action="{{ route('market.admin.categories.destroy', $category->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Удалить категорию?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="px-4 py-2 rounded-xl border border-red-500 text-red-400 hover:bg-red-500 hover:text-white transition">

                                    Удалить

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white/5 border border-white/10 rounded-3xl p-10 text-center">

                    <h3 class="text-2xl text-white mb-3">
                        Категорий пока нет
                    </h3>

                    <p class="text-gray-400">
                        Добавьте первую категорию в систему.
                    </p>

                </div>

            @endforelse

        </div>

    </section>

@endsection

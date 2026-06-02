@extends('layouts.market.index')

@section('title', 'Каталог товаров')

@section('main')

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="mb-10 flex flex-col gap-6">

            <div>
                <h1 class="text-5xl font-extrabold text-white">
                    Каталог товаров
                </h1>

                <p class="text-gray-300 text-lg mt-3">
                    Выберите товар из каталога и перейдите к покупке
                </p>
            </div>

            <div class="max-w-xl">
                <input
                    id="searchInput"
                    type="text"
                    placeholder="Поиск..."
                    class="w-full px-5 py-3 rounded-xl bg-white/5 border border-white/10 text-white focus:border-amber-500 outline-none"
                >
            </div>

        </div>

        <div id="productsGrid"
             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @include('market._cards', ['products' => $products])

        </div>

    </section>

    <script>
        const input = document.getElementById('searchInput');
        const grid = document.getElementById('productsGrid');

        let timeout = null;

        input.addEventListener('input', function () {

            clearTimeout(timeout);

            timeout = setTimeout(async () => {

                const q = input.value.trim();
                const url = "/market/catalog/search?q=" + encodeURIComponent(q);
                console.log(url);
                const res = await fetch(`{{ route('market.catalog.search') }}?q=` + encodeURIComponent(q));

                const html = await res.text();

                grid.innerHTML = '';

                grid.insertAdjacentHTML('beforeend', html);

            }, 200);

        });
    </script>

@endsection

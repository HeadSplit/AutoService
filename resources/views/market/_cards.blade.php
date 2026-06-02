@foreach($products as $product)

    <div class="bg-white/10 border border-white/10 rounded-3xl overflow-hidden hover:border-amber-500 transition flex flex-col">

        <a href="{{ route('market.catalog.product', $product->slug) }}">
            <div class="relative h-56 bg-white p-4 flex items-center justify-center">

                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="max-w-full max-h-full object-contain"
                         alt="{{ $product->name }}">
                @else
                    <div class="text-gray-500 text-center">
                        Нет изображения
                    </div>
                @endif

            </div>
        </a>

        <div class="p-5 flex flex-col flex-grow">

            <a href="{{ route('market.catalog.product', $product->slug) }}">
                <h2 class="text-lg font-bold text-white hover:text-amber-400 transition min-h-[56px]">
                    {{ $product->name }}
                </h2>
            </a>

            <p class="text-gray-300 text-sm mt-3 min-h-[60px]">
                {{ Str::limit($product->description, 90) }}
            </p>

            <div class="flex flex-wrap gap-2 mt-4">
                @if($product->brand)
                    <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200 text-xs">
                        {{ $product->brand->name }}
                    </span>
                @endif

                @if($product->category)
                    <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200 text-xs">
                        {{ $product->category->name }}
                    </span>
                @endif
            </div>

            <div class="mt-4 text-sm text-gray-300">
                Артикул:
                <span class="font-semibold text-white">
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

            <div class="mt-auto pt-5 flex flex-col gap-3">

                <a href="{{ route('market.catalog.product', $product->slug) }}"
                   class="w-full text-center py-3 border border-white/20 rounded-xl text-white hover:border-amber-500 transition">
                    Открыть
                </a>

                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf

                    <input type="hidden" name="quantity" value="1">

                    <button type="submit"
                            class="w-full py-3 bg-amber-500 text-black rounded-xl font-semibold hover:scale-[1.02] transition">
                        Добавить в корзину
                    </button>

                </form>

            </div>

        </div>

    </div>

@endforeach

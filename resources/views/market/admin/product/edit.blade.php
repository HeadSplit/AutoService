@extends('layouts.market.index')

@section('title', 'Редактирование товара')

@section('main')

    <section class="max-w-4xl mx-auto px-6 py-24">

        <h1 class="text-4xl font-bold text-white mb-10">
            Редактировать товар
        </h1>

        <form method="POST"
              action="{{ route('market.admin.products.update', $product->id) }}"
              enctype="multipart/form-data"
              class="space-y-6 bg-white/5 border border-white/10 rounded-3xl p-8">

            @csrf
            @method('PUT')

            <input type="text"
                   name="name"
                   value="{{ $product->name }}"
                   class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white"
                   placeholder="Название">

            <input type="text"
                   name="slug"
                   value="{{ $product->slug }}"
                   class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white"
                   placeholder="Slug">

            <textarea name="description"
                      class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white"
                      rows="5">{{ $product->description }}</textarea>

            <input type="number"
                   name="price"
                   value="{{ $product->price }}"
                   class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white">

            <input type="number"
                   name="quantity"
                   value="{{ $product->quantity }}"
                   class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white">

            <input type="text"
                   name="article"
                   value="{{ $product->article }}"
                   class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white">

            <select name="category_id"
                    class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white">

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected($product->category_id == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>

            <select name="brand_id"
                    class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white">

                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                        @selected($product->brand_id == $brand->id)>
                        {{ $brand->name }}
                    </option>
                @endforeach

            </select>

            <input type="file"
                   name="image"
                   class="w-full text-gray-300">

            <button class="w-full py-3 bg-amber-500 text-black font-bold rounded-xl hover:scale-105 transition">
                Сохранить
            </button>

        </form>

    </section>

@endsection

@extends('layouts.market.index')

@section('title', 'Редактирование бренда')

@section('main')

    <section class="max-w-2xl mx-auto px-6 py-24">

        <h1 class="text-4xl font-bold text-white mb-10">
            Редактировать бренд
        </h1>

        <form method="POST"
              action="{{ route('market.admin.brands.update', $brand->id) }}"
              class="space-y-6 bg-white/5 border border-white/10 rounded-3xl p-8">

            @csrf
            @method('PUT')

            <input type="text"
                   name="name"
                   value="{{ $brand->name }}"
                   class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white"
                   placeholder="Название">

            <input type="text"
                   name="slug"
                   value="{{ $brand->slug }}"
                   class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white"
                   placeholder="Slug">

            <input type="text"
                   name="country"
                   value="{{ $brand->country }}"
                   class="w-full px-4 py-3 rounded-xl bg-black/40 border border-white/10 text-white"
                   placeholder="Страна">

            <button class="w-full py-3 bg-amber-500 text-black font-bold rounded-xl hover:scale-105 transition">
                Сохранить
            </button>

        </form>

    </section>

@endsection

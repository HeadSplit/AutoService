@extends('layouts.market.index')

@section('main')

    <div class="max-w-2xl mx-auto px-6 py-10 text-white">

        <h1 class="text-2xl font-semibold mb-6">Создать категорию</h1>

        <form method="POST" action="{{ route('market.admin.categories.store') }}"
              class="bg-[#111] border border-white/10 rounded-2xl p-6 space-y-4">

            @csrf

            <div>
                <label class="text-sm text-gray-400">Название</label>
                <input type="text" name="name"
                       class="w-full mt-1 p-3 bg-black border border-white/10 rounded-xl text-white">
            </div>

            <div>
                <label class="text-sm text-gray-400">Slug (можно не заполнять)</label>
                <input type="text" name="slug"
                       class="w-full mt-1 p-3 bg-black border border-white/10 rounded-xl text-white">
            </div>

            <div>
                <label class="text-sm text-gray-400">Описание</label>
                <textarea name="description"
                          class="w-full mt-1 p-3 bg-black border border-white/10 rounded-xl text-white"></textarea>
            </div>

            <button class="w-full py-3 bg-amber-500 text-black rounded-xl font-medium">
                Создать
            </button>

        </form>

    </div>

@endsection

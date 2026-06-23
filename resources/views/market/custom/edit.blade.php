@extends('layouts.market.index')

@section('main')

    <div class="max-w-2xl mx-auto px-6 py-12">

        <div class="bg-[#111] border border-white/10 rounded-3xl p-8">

            <h1 class="text-3xl font-bold mb-8">
                Редактирование заказа #{{ $custom->id }}
            </h1>

            <form
                action="{{ route('custom.update', $custom) }}"
                method="POST">

                @csrf
                @method('PUT')

                <label class="block mb-3 text-gray-400">
                    Статус заказа
                </label>

                <select
                    name="status"
                    class="w-full bg-black border border-white/10 rounded-2xl p-4">

                    <option
                        value="accepted"
                        @selected($custom->status === 'new')>

                        Новый

                    </option>

                    <option
                        value="in_progress"
                        @selected($custom->status === 'in_progress')>

                        В работе

                    </option>

                    <option
                        value="completed"
                        @selected($custom->status === 'completed')>

                        Завершён

                    </option>

                </select>

                <button
                    class="mt-6 w-full py-4 bg-amber-500 text-black rounded-2xl font-semibold">

                    Сохранить

                </button>

            </form>

        </div>

    </div>

@endsection

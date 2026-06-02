@extends('layouts.market.index')

@section('title', 'Редактирование заказа')

@section('main')

    <section class="max-w-2xl mx-auto px-6 py-20">

        <h1 class="text-4xl font-bold text-white mb-10">
            Редактирование заказа #{{ $order->id }}
        </h1>

        <form method="POST"
              action="{{ route('market.admin.custom.update', $order->id) }}"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>
                <label class="text-gray-400 text-sm">Статус</label>

                <select name="status"
                        class="w-full mt-2 px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white">

                    <option value="accepted" @selected($order->status == 'accepted')>
                        Accepted
                    </option>

                    <option value="processing" @selected($order->status == 'processing')>
                        Processing
                    </option>

                    <option value="completed" @selected($order->status == 'completed')>
                        Completed
                    </option>

                    <option value="canceled" @selected($order->status == 'canceled')>
                        Canceled
                    </option>

                </select>

            </div>

            <button class="w-full py-3 bg-amber-500 text-black font-bold rounded-xl">
                Сохранить
            </button>

        </form>

    </section>

@endsection

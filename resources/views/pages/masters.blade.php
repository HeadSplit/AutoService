@extends('layouts.index')
@section('main')
    <h1 style="text-align: center; color: #FFFFFF; padding-top: 30px">Наши мастера</h1>
    <div class="cards">
        @foreach($masters as $master)
            @php
                $workExperience = \Carbon\Carbon::parse($master->work_experience);
                $now = \Carbon\Carbon::now();
                $diff = $now->diff($workExperience);
            @endphp
            <div class="card" data-bs-theme="dark" style="width: 25rem;">
                <img src="{{ asset('storage/' . ($master->image ?? 'uploads/masters/default.png')) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$master->name}} {{$master->last_name}}</h5>
                    <p class="card-text">
                        Опыт работы:
                        {{ $diff->y }} {{ $diff->y == 1 ? 'год' : ($diff->y > 1 && $diff->y < 5 ? 'года' : 'лет') }}
                        {{ $diff->m }} {{ $diff->m == 1 ? 'месяц' : ($diff->m > 1 && $diff->m < 5 ? 'месяца' : 'месяцев') }}
                        {{ $diff->d }} {{ $diff->d == 1 ? 'день' : ($diff->d > 1 && $diff->d < 5 ? 'дня' : 'дней') }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

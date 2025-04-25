@extends('layouts.index')


@section('main')
    <div>
        <form action="{{route('create.post')}}" method="post">
            @csrf
            <label for="">Ф.И.О</label>
            <input type="text" name="full_name" id="full_name" placeholder="ФИО">
            <input type="text" name="mark" id="" placeholder="Марка машины">
            <input type="text" name="model" placeholder="Модель">
            <input type="text" name="state_number" id="" placeholder="Госномер">
            <input type="text" name="region" id="" placeholder="Номер региона">
            <input type="text" name="phone_number" id="" placeholder="Номер телефона">
            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            <button type="submit">Отправить</button>
        </form>
    </div>
@endsection

@extends('layouts.index')

@section('main')

        <div class="container d-flex" data-bs-theme="dark" style="color: #FFFFFF; padding: 30px 0">
            <div>
                <h1>Профиль</h1>
                <img style="width: 400px; height: 400px; border-radius: 50%;"
                     src="{{isset($user) && $user->image ? asset('storage/' . $user->image) : asset('storage/uploads/avatars/default.jpg') }}">

                <form action="{{route('upload')}}" method="post" class="mb-3" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control-file" type="file" id="avatar" name="avatar">
                    <button type="submit" class="btn btn-success">Загрузить</button>
                </form>
                <form action="{{route('deleteImage')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            <div>
                <h2>Здравствуйте, {{$user->name}}</h2>
                <h3>Ваша роль: {{$user->role}}</h3>
                <div style="display: flex; flex-direction: column; width: 15%; gap: 20px;">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выход</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="container" data-bs-theme="dark" style="color: #FFFFFF; padding: 30px 0">
            <h1>Ваши заказы</h1>
            @if(count($orders) > 0)
            @foreach($orders as $order)
                <div class="card" data-bs-theme="dark" style="width: 25rem;">
                    <img src="{{ asset('storage/' . $order->image) }}" class="card-img-top" alt="Изображение заказа">
                    <div class="card-body">
                        <h5 class="card-title">{{$order->description}}</h5>
                        <p class="card-text">{{$order->mark . ' ' . $order->model}}</p>
                        <a href="{{ route('show-order', [$order->uuid]) }}" class="btn btn-primary">Уточнить статус</a>
                    </div>
                </div>
            @endforeach
                @else
                <div class="container" align="center">
                <h3>Вы ещё не сделали ни одного заказа</h3>
                </div>
            @endif
        </div>

@endsection

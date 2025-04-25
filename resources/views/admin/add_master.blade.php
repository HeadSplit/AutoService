@extends('layouts.index')

@section('main')
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Добавить мастера</h1>

    <form action="{{ route('create.master') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="user_id">Выберите пользователя</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="" disabled selected>Выберите пользователя</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Введите Имя">
        </div>

        <div class="form-group">
            <label for="last_name">Фамилия</label>
            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Введите фамилию">
        </div>

        <div class="form-group">
            <h3 class="text-white">Дата первого устройства на работу</h3>
            <input type="date" name="work_experience" id="work_experience" class="form-control" required>
        </div>

        <div class="form-group">
            <h3 class="text-white">Фотография</h3>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Добавить мастера</button>
    </form>
@endsection

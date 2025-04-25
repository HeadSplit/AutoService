@extends('layouts.index')


@section('main')
    <div id="carouselExample" data-bs-theme="dark" class="carousel slide bg-black">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/3.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div>
        <a href="{{route('create')}}">
        <h1 class="text text-success">Оставить заявку</h1>
        </a>
    </div>
    <div class="cards">
        <h1></h1>
{{--        Тут @foreach ебаш--}}
        <div class="card" data-bs-theme="dark" style="width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
{{--        Ахуеешь, но тут @endforeach--}}

{{--        Тестовые--}}
        <div class="card" data-bs-theme="dark" style="width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>        <div class="card" data-bs-theme="dark" style="width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>        <div class="card" data-bs-theme="dark" style="width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>        <div class="card" data-bs-theme="dark" style="width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>        <div class="card" data-bs-theme="dark" style="width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
{{--        Конец тестовых--}}



    </div>


@endsection

@extends('layouts.index')


@section('main')
    <div id="carouselExample" data-bs-theme="dark" class="carousel slide bg-black">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/1.jpg')}}" class="d-block w-100 carousel-photo" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/2.jpg')}}" class="d-block w-100 carousel-photo" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/3.jpg')}}" class="d-block w-100 carousel-photo" alt="...">
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
    <div class="cards container d-flex flex-wrap justify-content-center mt-5">
        <div class="d-flex flex-column w-100 text-center mb-5">
            <h1 class="text-white">ЛЮБЫЕ ВИДЫ УСЛУГ</h1>
            <h1 class="text-danger">ДЛЯ ВАШЕГО АВТО</h1>
        </div>
{{--        Тут @foreach ебаш--}}
        <div class="card" data-bs-theme="dark" style="width: 25rem; height: 400px;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Диагностика и ремонт двигателя</h5>
                <p class="card-text">Профессиональная компьютерная диагностика, капитальный ремонт двигателей любой сложности, замена ГРМ и устранение течей</p>
            </div>
        </div>
{{--        Ахуеешь, но тут @endforeach--}}

{{--        Тестовые--}}
        <div class="card" data-bs-theme="dark" style="height: 400px; width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Техническое обслуживание</h5>
                <p class="card-text">Регулярное ТО по регламенту производителя, замена масла и фильтров, обслуживание тормозной системы и ходовой части</p>
            </div>
        </div>
        <div class="card" data-bs-theme="dark" style="height: 400px; width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Ремонт электрооборудования</h5>
                <p class="card-text">Диагностика и устранение неисправностей электросистем, ремонт стартеров, генераторов и блоков управления</p>
            </div>
        </div>
        <div class="card" data-bs-theme="dark" style="height: 400px; width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Кузовной ремонт и покраска</h5>
                <p class="card-text">Восстановление геометрии кузова, удаление вмятин, профессиональная покраска в камере и полировка автомобиля.</p>
            </div>
        </div>
        <div class="card" data-bs-theme="dark" style="height: 400px; width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Шиномонтаж и балансировка</h5>
                <p class="card-text">Сезонная замена шин, балансировка колес, ремонт проколов, подбор и продажа новых шин и дисков.</p>
            </div>
        </div>
        <div class="card" data-bs-theme="dark" style="height: 400px; width: 25rem;">
            <img src="{{asset('images/1.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Установка дополнительного оборудования</h5>
                <p class="card-text">Монтаж сигнализаций, парктроников, камер заднего вида и другого оборудования</p>
            </div>
        </div>


{{--        Конец тестовых--}}
        <div class="d-flex justify-content-center mt-4">
            <a class="btn-success btn text-decoration-none" href="{{route('create')}}">
                <h1 class="text">Оставить заявку</h1>
            </a>
        </div>


    </div>


@endsection

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Восточный' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }

        .glass {
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }
    </style>
</head>

<body class="bg-[#080808] text-white min-h-screen flex flex-col">

<header class="sticky top-0 left-0 right-0 z-50">

    <nav class="border-b border-white/10 bg-black/50 glass">

        <div class="max-w-7xl mx-auto px-6">

            <div class="h-20 flex items-center justify-between">

                {{-- Логотип --}}
                <a href="{{ route('market.index') }}"
                   class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-amber-500 flex items-center justify-center">

                        <span class="font-bold text-black">
                            В
                        </span>

                    </div>

                    <div>

                        <div class="font-semibold text-lg">
                            Восточный
                        </div>

                        <div class="text-xs text-gray-500">
                            Магазин автозапчастей
                        </div>

                    </div>

                </a>

                {{-- Desktop menu --}}
                <div class="hidden lg:flex items-center gap-8">

                    <a href="{{ route('market.index') }}"
                       class="text-gray-300 hover:text-white transition">
                        Главная
                    </a>

                    <a href="{{route('market.catalog')}}"
                       class="text-gray-300 hover:text-white transition">
                        Каталог
                    </a>

                    <a href="{{route('market.brands')}}"
                       class="text-gray-300 hover:text-white transition">
                        Бренды
                    </a>

                    <a href="{{route('market.categories')}}"
                       class="text-gray-300 hover:text-white transition">
                        Категории
                    </a>
                    @can('admin')
                    <a href="{{route('market.admin')}}"
                       class="text-gray-300 hover:text-white transition">
                        Админ-панель
                    </a>
                    @endcan
                    <a href="{{route('home')}}"
                       class="text-gray-300 hover:text-white transition">
                        СТО
                    </a>
                </div>

                {{-- Правая часть --}}
                <div class="hidden lg:flex items-center gap-4">

                    {{-- Поиск --}}
                    @guest

                        <a href="{{ route('login') }}"
                           class="text-gray-300 hover:text-white transition">
                            Вход
                        </a>

                        <a href="{{ route('register') }}"
                           class="px-5 py-2 rounded-xl bg-amber-500 text-black font-medium hover:scale-105 transition">
                            Регистрация
                        </a>

                    @endguest

                    @auth

                        <a href="{{ route('lk') }}"
                           class="text-gray-300 hover:text-white transition">
                            Кабинет
                        </a>

                        <form action="{{ route('logout') }}"
                              method="POST">
                            @csrf

                            <button
                                class="px-4 py-2 rounded-xl border border-white/15 hover:border-white/40 transition">
                                Выйти
                            </button>

                        </form>

                    @endauth

                    @php
                        use App\Services\CartService;
                    @endphp

                    <a href="{{ route('cart.index') }}"
                       class="relative p-3 rounded-xl border border-white/10 hover:border-amber-500 transition text-white">

                        🛒

                        @php $count = CartService::count(); @endphp

                        @if($count > 0)
                            <span class="absolute -top-2 -right-2 bg-amber-500 text-black text-xs w-5 h-5 rounded-full flex items-center justify-center">
            {{ $count }}
        </span>
                        @endif

                    </a>

                </div>

                {{-- Mobile button --}}
                <button
                    id="menuBtn"
                    class="lg:hidden text-2xl">
                    ☰
                </button>

            </div>

        </div>

    </nav>

    {{-- Mobile menu --}}
    <div
        id="mobileMenu"
        class="hidden lg:hidden bg-[#111] border-b border-white/10">

        <div class="px-6 py-6 flex flex-col gap-4">

            <a href="{{ route('home') }}">Главная</a>
            <a href="{{route('market.catalog')}}">Каталог</a>
            <a href="#{{route('market.admin.brands')}}">Бренды</a>
            <a href="{{route('home')}}">СТО</a>
            @can('admin')
                <a href="{{route('market.admin')}}">Админ-меню</a>
            @endcan
            <a href="#contacts">Контакты</a>

            <hr class="border-white/10">

            @guest

                <a href="{{ route('login') }}">
                    Вход
                </a>

                <a href="{{ route('register') }}">
                    Регистрация
                </a>

            @endguest

            @auth

                <a href="{{ route('lk') }}">
                    Кабинет
                </a>

            @endauth

        </div>

    </div>

</header>


<main class="flex-grow">
    @yield('main')
</main>


<footer
    id="contacts"
    class="border-t border-white/10 bg-[#060606]">

    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid md:grid-cols-4 gap-10">

            <div>

                <h3 class="font-semibold text-xl mb-4">
                    Восточный
                </h3>

                <p class="text-gray-500">
                    Качественные автозапчасти
                    для автомобилей любых марок.
                </p>

            </div>

            <div>

                <h4 class="font-semibold mb-4">
                    Каталог
                </h4>

                <ul class="space-y-2 text-gray-500">

                    <li>Фильтры</li>
                    <li>Масла</li>
                    <li>Подвеска</li>
                    <li>Тормоза</li>

                </ul>

            </div>

            <div>

                <h4 class="font-semibold mb-4">
                    Контакты
                </h4>

                <ul class="space-y-2 text-gray-500">

                    <li>+7 (999) 123-45-67</li>
                    <li>info@vostochniy72.ru</li>
                    <li>Пн–Вс 09:00–21:00</li>

                </ul>

            </div>

            <div>

                <h4 class="font-semibold mb-4">
                    Информация
                </h4>

                <ul class="space-y-2 text-gray-500">

                    <li>Доставка</li>
                    <li>Оплата</li>
                    <li>Гарантия</li>
                    <li>Политика конфиденциальности</li>

                </ul>

            </div>

        </div>

        <div class="mt-12 pt-8 border-t border-white/10 text-center text-gray-600">

            © {{ date('Y') }} Восточный. Все права защищены.

        </div>

    </div>

</footer>


<script>

    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');

    btn?.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

</script>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo e($title); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <link rel="stylesheet" href="<?php echo e(asset('style/app.css')); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap&subset=cyrillic"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<header class="fixed top-0 left-0 right-0 z-50">

    <nav class="border-b border-white/10 bg-black/50 glass">

        <div class="max-w-7xl mx-auto px-6">

            <div class="h-20 flex items-center justify-between">

                
                <a href="<?php echo e(route('home')); ?>"
                   class="flex items-center gap-3 shrink-0 text-white no-underline">

                    <div class="w-10 h-10 rounded-xl bg-amber-500 flex items-center justify-center">
                        <span class="font-bold text-black">В</span>
                    </div>

                    <div>
                        <div class="font-semibold text-lg">СТО Восточный</div>
                        <div class="text-xs text-gray-500">Автосервис</div>
                    </div>

                </a>

                
                <div class="hidden lg:flex items-center gap-5 text-sm">

                    <a href="<?php echo e(route('home')); ?>" class="text-gray-300 hover:text-white">
                        Главная
                    </a>

                    <a href="<?php echo e(route('about')); ?>" class="text-gray-300 hover:text-white">
                        О нас
                    </a>

                    <a href="<?php echo e(route('masters')); ?>" class="text-gray-300 hover:text-white">
                        Наши мастера
                    </a>

                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('market.index')); ?>" class="text-gray-300 hover:text-white">
                            Магазин
                        </a>

                        <a href="<?php echo e(route('lk')); ?>" class="text-gray-300 hover:text-white">
                            Личный кабинет
                        </a>

                        <?php if(Auth::user()->role == 'админ'): ?>
                            <a href="<?php echo e(route('requests')); ?>" class="text-gray-300 hover:text-white">
                                Админ
                            </a>

                            <a href="<?php echo e(route('admin.masters')); ?>" class="text-gray-300 hover:text-white">
                                Мастера
                            </a>

                            <a href="<?php echo e(route('add.master')); ?>" class="text-gray-300 hover:text-white">
                                Добавить
                            </a>
                        <?php endif; ?>

                        <?php if(Auth::user()->role == 'мастер'): ?>
                            <a href="<?php echo e(route('master.tasks')); ?>" class="text-gray-300 hover:text-white">
                                Задачи
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(Auth::check() && (Auth::user()->role == 'админ' || Auth::user()->role == 'мастер')): ?>
                        <a href="<?php echo e(route('orders.index')); ?>" class="text-gray-300 hover:text-white">
                            Заказы
                        </a>
                    <?php endif; ?>

                </div>

                
                <div class="hidden lg:flex items-center gap-3">

                    <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>"
                           class="text-gray-300 hover:text-white">
                            Вход
                        </a>

                        <a href="<?php echo e(route('register')); ?>"
                           class="px-4 py-2 bg-amber-500 text-black rounded-xl text-decoration-none">
                            Регистрация
                        </a>
                    <?php endif; ?>

                    <?php if(auth()->guard()->check()): ?>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <button
                                type="submit"
                                class="px-4 py-2 border border-white/20 rounded-xl hover:border-white/50 text-white">
                                Выйти
                            </button>
                        </form>
                    <?php endif; ?>

                </div>

                
                <button
                    id="menuBtn"
                    class="lg:hidden text-white text-3xl border-0 bg-transparent">
                    ☰
                </button>

            </div>

        </div>

    </nav>

    
    <div id="mobileMenu"
         class="hidden lg:hidden bg-[#111] border-b border-white/10">

        <div class="px-6 py-6 flex flex-col gap-4">

            <a href="<?php echo e(route('home')); ?>" class="text-white mobile-link">
                Главная
            </a>

            <a href="<?php echo e(route('about')); ?>" class="text-white mobile-link">
                О нас
            </a>

            <a href="<?php echo e(route('masters')); ?>" class="text-white mobile-link">
                Наши мастера
            </a>

            <?php if(auth()->guard()->check()): ?>

                <a href="<?php echo e(route('market.index')); ?>" class="text-white mobile-link">
                    Магазин
                </a>

                <a href="<?php echo e(route('lk')); ?>" class="text-white mobile-link">
                    Личный кабинет
                </a>

                <?php if(Auth::user()->role == 'админ'): ?>

                    <a href="<?php echo e(route('requests')); ?>" class="text-white mobile-link">
                        Админ
                    </a>

                    <a href="<?php echo e(route('admin.masters')); ?>" class="text-white mobile-link">
                        Мастера
                    </a>

                    <a href="<?php echo e(route('add.master')); ?>" class="text-white mobile-link">
                        Добавить мастера
                    </a>

                <?php endif; ?>

                <?php if(Auth::user()->role == 'мастер'): ?>

                    <a href="<?php echo e(route('master.tasks')); ?>" class="text-white mobile-link">
                        Задачи
                    </a>

                <?php endif; ?>

                <?php if(Auth::user()->role == 'админ' || Auth::user()->role == 'мастер'): ?>

                    <a href="<?php echo e(route('orders.index')); ?>" class="text-white mobile-link">
                        Заказы
                    </a>

                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>

                    <button type="submit"
                            class="w-full text-start text-red-400 border-0 bg-transparent p-0">
                        Выйти
                    </button>
                </form>

            <?php endif; ?>

            <?php if(auth()->guard()->guest()): ?>

                <a href="<?php echo e(route('login')); ?>" class="text-white mobile-link">
                    Вход
                </a>

                <a href="<?php echo e(route('register')); ?>" class="text-white mobile-link">
                    Регистрация
                </a>

            <?php endif; ?>

        </div>

    </div>

</header>

<main class="flex-grow pt-20 bg-[#080808]">
    <?php echo $__env->yieldContent('main'); ?>
</main>

<footer class="border-t border-white/10 bg-[#060606]">

    <div class="max-w-7xl mx-auto px-6 py-8">

        <p class="text-center text-gray-500">
            © <?php echo e(date('Y')); ?> СТО "Восточный". Все права защищены.
        </p>

    </div>

</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        menuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });

        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php /**PATH /var/www/resources/views/layouts/index.blade.php ENDPATH**/ ?>
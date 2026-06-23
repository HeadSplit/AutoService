<?php $__env->startSection('title', 'Админ панель'); ?>

<?php $__env->startSection('main'); ?>

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="mb-12">

            <h1 class="text-4xl font-bold text-white">
                Админ панель
            </h1>

            <p class="text-gray-400 mt-3">
                Управление каталогом магазина
            </p>

        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            <a href="<?php echo e(route('market.admin.products')); ?>"
               class="group bg-white/5 border border-white/10 rounded-3xl p-8 hover:border-amber-500 transition">

                <div class="w-14 h-14 rounded-2xl bg-amber-500 flex items-center justify-center text-black text-2xl mb-6">
                    📦
                </div>

                <h2 class="text-xl font-semibold text-white mb-2">
                    Продукты
                </h2>

                <p class="text-gray-400">
                    Добавление, редактирование и удаление товаров магазина.
                </p>

            </a>

            <a href="<?php echo e(route('market.admin.brands')); ?>"
               class="group bg-white/5 border border-white/10 rounded-3xl p-8 hover:border-amber-500 transition">

                <div class="w-14 h-14 rounded-2xl bg-amber-500 flex items-center justify-center text-black text-2xl mb-6">
                    🚗
                </div>

                <h2 class="text-xl font-semibold text-white mb-2">
                    Бренды
                </h2>

                <p class="text-gray-400">
                    Управление производителями и автомобильными брендами.
                </p>

            </a>

            <a href="<?php echo e(route('market.admin.categories')); ?>"
               class="group bg-white/5 border border-white/10 rounded-3xl p-8 hover:border-amber-500 transition">

                <div class="w-14 h-14 rounded-2xl bg-amber-500 flex items-center justify-center text-black text-2xl mb-6">
                    📂
                </div>

                <h2 class="text-xl font-semibold text-white mb-2">
                    Категории
                </h2>

                <p class="text-gray-400">
                    Управление категориями товаров и структурой каталога.
                </p>

            </a>

            <a href="<?php echo e(route('custom.index')); ?>"
               class="group bg-white/5 border border-white/10 rounded-3xl p-8 hover:border-amber-500 transition">

                <div class="w-14 h-14 rounded-2xl bg-amber-500 flex items-center justify-center text-black text-2xl mb-6">
                    📋
                </div>

                <h2 class="text-xl font-semibold text-white mb-2">
                    Заказы клиентов
                </h2>

                <p class="text-gray-400">
                    Просмотр, изменение статусов и удаление заявок клиентов.
                </p>

            </a>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/admin/index.blade.php ENDPATH**/ ?>
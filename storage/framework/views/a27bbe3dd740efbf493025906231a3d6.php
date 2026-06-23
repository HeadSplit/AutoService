<?php $__env->startSection('main'); ?>

    <section class="relative min-h-screen overflow-hidden bg-[#080808]">

        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-black/80"></div>

            <img
                src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?q=80&w=2070"
                alt=""
                class="w-full h-full object-cover blur-sm opacity-20">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 pt-40 pb-32">

            <div class="max-w-4xl">

                <div class="w-32 h-px bg-gradient-to-r from-transparent via-amber-500 to-transparent mb-8"></div>

                <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight">
                    Оригинальные и качественные
                    <span class="text-amber-400">
                    автозапчасти
                </span>
                    для любых автомобилей
                </h1>

                <p class="mt-8 text-lg md:text-xl text-gray-400 max-w-2xl">
                    Масла, фильтры, тормозные системы, аккумуляторы
                    и тысячи других товаров от проверенных производителей
                    с быстрой доставкой по всей стране.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a href="<?php echo e(route('market.catalog')); ?>"
                       class="px-8 py-4 rounded-full bg-amber-500 text-black font-medium transition hover:scale-105">
                        Перейти в каталог
                    </a>

                    <a href="#categories"
                       class="px-8 py-4 rounded-full border border-white/15 text-white hover:border-white/40 transition">
                        Подобрать запчасть
                    </a>

                </div>

            </div>

        </div>

    </section>


    <section class="bg-[#0c0c0c] py-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16">

                <div class="mx-auto w-24 h-px bg-amber-500 mb-6"></div>

                <h2 class="text-4xl font-bold text-white">
                    Почему выбирают нас
                </h2>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white/[0.03] border border-white/10 rounded-3xl p-8 hover:border-amber-500/50 transition">
                    <div class="text-4xl mb-5">📦</div>
                    <h3 class="text-xl text-white font-semibold mb-3">
                        Оригинальные запчасти
                    </h3>
                    <p class="text-gray-400">
                        Только проверенные поставщики и официальные бренды.
                    </p>
                </div>

                <div class="bg-white/[0.03] border border-white/10 rounded-3xl p-8 hover:border-amber-500/50 transition">
                    <div class="text-4xl mb-5">🚚</div>
                    <h3 class="text-xl text-white font-semibold mb-3">
                        Быстрая доставка
                    </h3>
                    <p class="text-gray-400">
                        Отправка заказов в кратчайшие сроки.
                    </p>
                </div>

                <div class="bg-white/[0.03] border border-white/10 rounded-3xl p-8 hover:border-amber-500/50 transition">
                    <div class="text-4xl mb-5">🛡️</div>
                    <h3 class="text-xl text-white font-semibold mb-3">
                        Гарантия качества
                    </h3>
                    <p class="text-gray-400">
                        Все товары проходят проверку перед отправкой.
                    </p>
                </div>

                <div class="bg-white/[0.03] border border-white/10 rounded-3xl p-8 hover:border-amber-500/50 transition">
                    <div class="text-4xl mb-5">🎧</div>
                    <h3 class="text-xl text-white font-semibold mb-3">
                        Помощь специалистов
                    </h3>
                    <p class="text-gray-400">
                        Подскажем совместимость и подберём нужную деталь.
                    </p>
                </div>

            </div>

        </div>

    </section>


    <section id="categories" class="bg-[#080808] py-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex items-center justify-between mb-12">
                <h2 class="text-4xl font-bold text-white">
                    Популярные категории
                </h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="group bg-[#111] rounded-3xl overflow-hidden border border-white/10">
                    <img src="https://images.unsplash.com/photo-1625047509248-ec889cbff17f?q=80&w=1200"
                         class="h-56 w-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-6">
                        <h3 class="text-xl text-white font-semibold">
                            Масла и жидкости
                        </h3>
                    </div>
                </div>

                <div class="group bg-[#111] rounded-3xl overflow-hidden border border-white/10">
                    <img src="https://автошик.рф/upload/medialibrary/199/ri96b6pu9ajz6av3ftzjyvkmkw6lhzwq.jpg"
                         class="h-56 w-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-6">
                        <h3 class="text-xl text-white font-semibold">
                            Фильтры
                        </h3>
                    </div>
                </div>

                <div class="group bg-[#111] rounded-3xl overflow-hidden border border-white/10">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1200"
                         class="h-56 w-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="p-6">
                        <h3 class="text-xl text-white font-semibold">
                            Тормозная система
                        </h3>
                    </div>
                </div>

            </div>

        </div>

    </section>


    <section id="catalog" class="bg-[#0c0c0c] py-24">

        <div class="max-w-7xl mx-auto px-6">

            <div class="mb-16">

                <div class="w-24 h-px bg-amber-500 mb-6"></div>

                <h2 class="text-4xl font-bold text-white">
                    Популярные товары
                </h2>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <?php $__currentLoopData = $products->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="bg-[#111] border border-white/10 rounded-3xl overflow-hidden hover:border-amber-500/40 transition flex flex-col">

                        <?php if($product->image): ?>
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                                 class="w-full h-52 object-cover"
                                 alt="<?php echo e($product->name); ?>">
                        <?php else: ?>
                            <div class="w-full h-52 bg-black/20 flex items-center justify-center text-gray-500">
                                Нет фото
                            </div>
                        <?php endif; ?>

                        <div class="p-6 flex flex-col flex-grow">

                        <span class="text-sm text-gray-500">
                            <?php echo e($product->brand?->name ?? 'Без бренда'); ?>

                        </span>

                            <h3 class="text-white font-semibold mt-2 min-h-[48px]">
                                <?php echo e($product->name); ?>

                            </h3>

                            <div class="mt-auto flex items-center justify-between pt-4">

                            <span class="text-xl text-amber-400 font-bold">
                                <?php echo e(number_format($product->price, 0, ',', ' ')); ?> ₽
                            </span>

                                <form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="quantity" value="1">

                                    <button class="px-4 py-2 rounded-xl bg-amber-500 text-black font-medium hover:scale-105 transition">
                                        В корзину
                                    </button>
                                </form>

                            </div>

                        </div>
                            <a href="<?php echo e(route('market.catalog.product', $product->slug)); ?>"
                               class="px-4 py-2 rounded-xl border border-white/20 text-white hover:border-amber-500 hover:text-amber-400 transition">
                                Просмотреть
                            </a>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>

    </section>


    <section class="bg-[#080808] py-24 border-t border-white/10">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-4xl font-bold text-white mb-12">
                Популярные бренды
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-10 text-gray-500 text-2xl font-semibold">

                <div>BOSCH</div>
                <div>MANN</div>
                <div>NGK</div>
                <div>FEBI</div>
                <div>MAHLE</div>

            </div>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/index.blade.php ENDPATH**/ ?>
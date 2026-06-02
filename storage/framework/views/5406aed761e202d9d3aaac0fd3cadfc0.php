<?php $__env->startSection('title', 'Бренды'); ?>

<?php $__env->startSection('main'); ?>

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="mb-12">

            <h1 class="text-5xl font-extrabold text-white">
                Бренды
            </h1>

            <p class="text-gray-300 text-lg mt-3">
                Выберите бренд и посмотрите товары
            </p>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="bg-white/10 border border-white/10 rounded-3xl p-6 flex flex-col hover:border-amber-500 transition">

                    <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center text-2xl text-gray-300 mb-4">
                        🏷️
                    </div>

                    <h2 class="text-xl font-bold text-white">
                        <?php echo e($brand->name); ?>

                    </h2>

                    <?php if($brand->country): ?>
                        <p class="text-gray-400 mt-1">
                            <?php echo e($brand->country); ?>

                        </p>
                    <?php endif; ?>

                    <div class="flex flex-wrap gap-2 mt-4">

                    <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-xs">
                        <?php echo e($brand->slug); ?>

                    </span>

                        <?php if(isset($brand->products_count)): ?>
                            <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 text-xs">
                            Товаров: <?php echo e($brand->products_count); ?>

                        </span>
                        <?php endif; ?>

                    </div>

                    <div class="mt-auto pt-6">

                        <a href="<?php echo e(route('brand.show', $brand->slug)); ?>"
                           class="w-full block text-center py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-[1.02] transition">

                            Просмотреть товары

                        </a>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-span-full bg-white/10 border border-white/10 rounded-3xl p-12 text-center">

                    <h3 class="text-2xl text-white mb-3">
                        Брендов пока нет
                    </h3>

                    <p class="text-gray-400">
                        Попробуйте позже
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/brands.blade.php ENDPATH**/ ?>
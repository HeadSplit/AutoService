<?php $__env->startSection('title', $category->name); ?>

<?php $__env->startSection('main'); ?>

    <section class="max-w-7xl mx-auto px-6 py-16">

        
        <div class="mb-12">

            <div class="inline-flex px-4 py-2 rounded-full bg-amber-500/10 text-amber-400 text-sm mb-4">
                Категория
            </div>

            <h1 class="text-5xl font-extrabold text-white">
                <?php echo e($category->name); ?>

            </h1>

            <p class="text-gray-400 text-lg mt-3">
                <?php echo e($category->description); ?>

            </p>

            <div class="mt-4 text-gray-300">
                Товаров в категории: <?php echo e($category->products->count()); ?>

            </div>

        </div>

        
        <div class="mb-8">

            <h2 class="text-3xl font-bold text-white">
                Товары категории
            </h2>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            <?php $__empty_1 = true; $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="bg-white/10 border border-white/10 rounded-3xl overflow-hidden hover:border-amber-500 transition flex flex-col">

                    
                    <a href="<?php echo e(route('market.catalog.product', $product->slug)); ?>">

                        <div class="h-56 bg-white p-4 flex items-center justify-center">

                            <?php if($product->image): ?>

                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                                     class="max-w-full max-h-full object-contain"
                                     alt="<?php echo e($product->name); ?>">

                            <?php else: ?>

                                <div class="text-gray-500">
                                    Нет изображения
                                </div>

                            <?php endif; ?>

                        </div>

                    </a>

                    
                    <div class="p-5 flex flex-col flex-grow">

                        <a href="<?php echo e(route('market.catalog.product', $product->slug)); ?>">

                            <h3 class="text-lg font-bold text-white hover:text-amber-400 transition">
                                <?php echo e($product->name); ?>

                            </h3>

                        </a>

                        <div class="mt-3">

                            <?php if($product->brand): ?>
                                <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200 text-xs">
                                <?php echo e($product->brand->name); ?>

                            </span>
                            <?php endif; ?>

                        </div>

                        <div class="mt-4 text-sm text-gray-300">

                            Артикул:
                            <span class="text-white font-semibold">
                            <?php echo e($product->article); ?>

                        </span>

                        </div>

                        <div class="mt-3">

                            <?php if($product->quantity > 0): ?>

                                <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-300 text-sm">
                                В наличии: <?php echo e($product->quantity); ?>

                            </span>

                            <?php else: ?>

                                <span class="px-3 py-1 rounded-full bg-red-500/10 text-red-300 text-sm">
                                Нет в наличии
                            </span>

                            <?php endif; ?>

                        </div>

                        <div class="mt-5 text-3xl font-extrabold text-amber-400">
                            <?php echo e(number_format($product->price, 0, ',', ' ')); ?> ₽
                        </div>

                        <div class="mt-auto pt-5">

                            <a href="<?php echo e(route('market.catalog.product', $product->slug)); ?>"
                               class="block text-center py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-[1.02] transition">

                                Подробнее

                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-span-full">

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-12 text-center">

                        <h3 class="text-2xl text-white mb-3">
                            В этой категории пока нет товаров
                        </h3>

                        <p class="text-gray-400">
                            Добавьте товары в категорию.
                        </p>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/category.blade.php ENDPATH**/ ?>
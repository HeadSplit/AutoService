<?php $__env->startSection('title', 'Товары'); ?>

<?php $__env->startSection('main'); ?>

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-4xl font-bold text-white">
                    Товары
                </h1>

                <p class="text-gray-400 mt-2">
                    Управление товарами магазина
                </p>

            </div>

            <a href="<?php echo e(route('market.admin.products.create')); ?>"
               class="px-5 py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-105 transition">

                Добавить товар

            </a>

        </div>

        <div class="space-y-6">

            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 hover:border-amber-500 transition">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-center gap-6">

                            <?php if($product->preview_image): ?>
                                <img
                                    src="<?php echo e(asset('storage/' . $product->preview_image)); ?>"
                                    alt="<?php echo e($product->title); ?>"
                                    class="w-28 h-28 rounded-2xl object-cover">
                            <?php else: ?>
                                <div class="w-28 h-28 rounded-2xl bg-white/10 flex items-center justify-center text-gray-500">
                                    Нет фото
                                </div>
                            <?php endif; ?>

                            <div>

                                <h2 class="text-xl font-semibold text-white">
                                    <?php echo e($product->title); ?>

                                </h2>

                                <p class="text-gray-400 mt-2">
                                    <?php echo e(Str::limit($product->description, 120)); ?>

                                </p>

                                <div class="flex flex-wrap gap-3 mt-4">

                                    <?php if($product->brand): ?>
                                        <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-sm">
                                            <?php echo e($product->brand->title); ?>

                                        </span>
                                    <?php endif; ?>

                                    <?php if($product->category): ?>
                                        <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-sm">
                                            <?php echo e($product->category->title); ?>

                                        </span>
                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                        <div class="flex flex-wrap gap-3">

                            <a href="<?php echo e(route('market.products.show', $product->id)); ?>"
                               class="px-4 py-2 rounded-xl border border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white transition">

                                Просмотреть

                            </a>

                            <a href="<?php echo e(route('market.admin.products.edit', $product->id)); ?>"
                               class="px-4 py-2 rounded-xl border border-amber-500 text-amber-400 hover:bg-amber-500 hover:text-black transition">

                                Изменить

                            </a>

                            <form action="<?php echo e(route('market.admin.products.destroy', $product->id)); ?>"
                                  method="POST"
                                  onsubmit="return confirm('Удалить товар?')">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    type="submit"
                                    class="px-4 py-2 rounded-xl border border-red-500 text-red-400 hover:bg-red-500 hover:text-white transition">

                                    Удалить

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="bg-white/5 border border-white/10 rounded-3xl p-10 text-center">

                    <h3 class="text-2xl text-white mb-3">
                        Товаров пока нет
                    </h3>

                    <p class="text-gray-400">
                        Добавьте первый товар в каталог.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/admin/products.blade.php ENDPATH**/ ?>
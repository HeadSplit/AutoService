<?php $__env->startSection('title', 'Бренды'); ?>

<?php $__env->startSection('main'); ?>

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-4xl font-bold text-white">
                    Бренды
                </h1>

                <p class="text-gray-400 mt-2">
                    Управление брендами магазина
                </p>

            </div>

            <a href="<?php echo e(route('market.admin.brands.create')); ?>"
               class="px-5 py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-105 transition">

                Добавить бренд

            </a>

        </div>

        <div class="space-y-6">

            <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 hover:border-amber-500 transition">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        
                        <div class="flex items-center gap-6">

                            
                            <div class="w-20 h-20 rounded-2xl bg-white/10 flex items-center justify-center text-2xl text-gray-300">
                                🏷️
                            </div>

                            <div>

                                <h2 class="text-xl font-semibold text-white">
                                    <?php echo e($brand->name); ?>

                                </h2>

                                <p class="text-gray-400 mt-2">
                                    <?php echo e($brand->country); ?>

                                </p>

                                <div class="flex flex-wrap gap-3 mt-4">

                                <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-sm">
                                    <?php echo e($brand->slug); ?>

                                </span>

                                    <?php if($brand->products_count ?? false): ?>
                                        <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 text-sm">
                                        Товаров: <?php echo e($brand->products_count); ?>

                                    </span>
                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                        
                        <div class="flex flex-wrap gap-3">

                            <a href="<?php echo e(route('market.admin.brand.show', $brand->id)); ?>"
                               class="px-4 py-2 rounded-xl border border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white transition">

                                Просмотреть

                            </a>

                            <a href="<?php echo e(route('market.admin.brands.update', $brand->id)); ?>"
                               class="px-4 py-2 rounded-xl border border-amber-500 text-amber-400 hover:bg-amber-500 hover:text-black transition">

                                Изменить

                            </a>

                            <form action="<?php echo e(route('market.admin.brands.destroy', $brand->id)); ?>"
                                  method="POST"
                                  onsubmit="return confirm('Удалить бренд?')">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit"
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
                        Брендов пока нет
                    </h3>

                    <p class="text-gray-400">
                        Добавьте первый бренд в систему.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/admin/brand/brands.blade.php ENDPATH**/ ?>
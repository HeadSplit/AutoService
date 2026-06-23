<?php $__env->startSection('title', 'Заказ #' . $order->id); ?>

<?php $__env->startSection('main'); ?>

    <section class="max-w-6xl mx-auto px-6 py-20">

        <div class="mb-10">

            <h1 class="text-4xl font-bold text-white">
                Заказ #<?php echo e($order->id); ?>

            </h1>

            <p class="text-gray-400 mt-2">
                Статус: <?php echo e($order->statusLabel()); ?>

            </p>

            <p class="text-amber-400 font-bold mt-2">
                Итого: <?php echo e(number_format($order->total, 0, ',', ' ')); ?> ₽
            </p>

        </div>

        <h2 class="text-2xl font-semibold text-white mb-6">
            Товары в заказе
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="bg-white/10 border border-white/10 rounded-3xl overflow-hidden">

                    <div class="p-5">

                        <div class="text-white font-semibold">
                            <?php echo e($item->product->name ?? 'Удалённый товар'); ?>

                        </div>

                        
                        <div class="text-gray-400 text-sm mt-2 space-y-1">

                            <div>
                                Бренд:
                                <span class="text-amber-400">
                        <?php echo e($item->product->brand->name ?? '—'); ?>

                    </span>
                            </div>

                            <div>
                                Категория:
                                <span class="text-amber-400">
                        <?php echo e($item->product->category->name ?? '—'); ?>

                    </span>
                            </div>

                        </div>

                        <div class="text-gray-400 text-sm mt-2">
                            Кол-во: <?php echo e($item->quantity); ?>

                        </div>

                        <div class="text-amber-400 font-bold mt-3">
                            <?php echo e(number_format($item->price * $item->quantity, 0, ',', ' ')); ?> ₽
                        </div>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/custom/show.blade.php ENDPATH**/ ?>
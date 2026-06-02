<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('main'); ?>

    <section class="max-w-6xl mx-auto px-6 pt-32 pb-16">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

            
            <div class="bg-white/10 border border-white/10 rounded-3xl overflow-hidden">

                <div class="w-full h-[320px] flex items-center justify-center p-6">

                    <?php if($product->image): ?>

                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                             class="max-h-[280px] max-w-full object-contain"
                             alt="<?php echo e($product->name); ?>">

                    <?php else: ?>

                        <div class="text-gray-400 text-lg">
                            Нет изображения
                        </div>

                    <?php endif; ?>

                </div>

            </div>

            
            <div class="space-y-6">

                <h1 class="text-4xl font-extrabold text-white">
                    <?php echo e($product->name); ?>

                </h1>

                <div class="flex flex-wrap gap-2">

                    <?php if($product->brand): ?>
                        <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200">
                            <?php echo e($product->brand->name); ?>

                        </span>
                    <?php endif; ?>

                    <?php if($product->category): ?>
                        <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200">
                            <?php echo e($product->category->name); ?>

                        </span>
                    <?php endif; ?>

                    <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200">
                        Артикул: <?php echo e($product->article); ?>

                    </span>

                </div>

                <div class="bg-black/40 border border-white/10 rounded-2xl p-6">

                    <div class="text-4xl font-extrabold text-amber-400">
                        <?php echo e(number_format($product->price, 0, ',', ' ')); ?> ₽
                    </div>

                    <div class="mt-3">

                        <?php if($product->quantity > 0): ?>
                            <span class="text-green-300 text-lg">
                                ✔ В наличии: <?php echo e($product->quantity); ?> шт.
                            </span>
                        <?php else: ?>
                            <span class="text-red-300 text-lg">
                                ✖ Нет в наличии
                            </span>
                        <?php endif; ?>

                    </div>

                </div>

                <div class="bg-white/5 border border-white/10 rounded-2xl p-6">

                    <h3 class="text-xl font-semibold text-white mb-4">
                        Описание
                    </h3>

                    <div class="text-gray-300 leading-relaxed">
                        <?php echo e($product->description); ?>

                    </div>

                </div>

                <form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="quantity" value="1">

                    <button class="w-full py-4 bg-amber-500 text-black font-bold text-lg rounded-xl hover:scale-105 transition">
                        Добавить в корзину
                    </button>

                </form>

            </div>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/show.blade.php ENDPATH**/ ?>
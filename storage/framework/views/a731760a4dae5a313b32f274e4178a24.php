<?php $__env->startSection('title', 'Корзина'); ?>

<?php $__env->startSection('main'); ?>

    <section class="max-w-5xl mx-auto px-6 py-16">

        <h1 class="text-4xl font-bold text-white mb-10">
            Корзина
        </h1>

        <?php if(count($products)): ?>

            <div class="space-y-5">

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="bg-white/5 border border-white/10 rounded-3xl p-6 flex items-center justify-between">

                        <div class="flex items-center gap-5">

                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                                 class="w-20 h-20 rounded-2xl object-cover">

                            <div>

                                <h2 class="text-white font-semibold text-lg">
                                    <?php echo e($product->name); ?>

                                </h2>

                                <p class="text-gray-400">
                                    <?php echo e(number_format($product->price, 0, ',', ' ')); ?> ₽
                                </p>

                            </div>

                        </div>

                        
                        <form method="POST" action="<?php echo e(route('cart.update', $product->id)); ?>"
                              class="flex items-center gap-3">

                            <?php echo csrf_field(); ?>

                            <input type="number"
                                   name="quantity"
                                   value="<?php echo e($product->cart_qty); ?>"
                                   class="w-20 bg-black/60 border border-white/20 rounded-xl text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">

                            <button class="px-4 py-2 bg-amber-500 text-black rounded-xl">
                                OK
                            </button>

                        </form>

                        
                        <form method="POST" action="<?php echo e(route('cart.remove', $product->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button class="text-red-400 hover:text-red-300">
                                удалить
                            </button>
                        </form>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            
            
            <form method="POST" action="<?php echo e(route('cart.store')); ?>"
                  class="mt-10 bg-white/5 border border-white/10 rounded-3xl p-6">

                <?php echo csrf_field(); ?>

                <div class="flex items-center justify-between">

                    <div class="text-white text-xl">
                        Итого:
                    </div>

                    <div class="text-amber-400 text-2xl font-bold">
                        <?php echo e(number_format($total, 0, ',', ' ')); ?> ₽
                    </div>

                </div>

                


                <button type="submit"
                        class="w-full mt-6 py-3 bg-amber-500 text-black rounded-xl font-bold hover:scale-[1.02] transition">

                    Оформить заказ

                </button>

            </form>

        <?php else: ?>

            <div class="bg-white/5 border border-white/10 rounded-3xl p-10 text-center text-gray-400">
                Корзина пуста
            </div>

        <?php endif; ?>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/cart/index.blade.php ENDPATH**/ ?>
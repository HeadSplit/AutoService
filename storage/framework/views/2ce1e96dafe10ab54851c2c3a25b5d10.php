<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="bg-white/10 border border-white/10 rounded-3xl overflow-hidden hover:border-amber-500 transition flex flex-col">

        <a href="<?php echo e(route('market.catalog.product', $product->slug)); ?>">
            <div class="relative h-56 bg-white p-4 flex items-center justify-center">

                <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                         class="max-w-full max-h-full object-contain"
                         alt="<?php echo e($product->name); ?>">
                <?php else: ?>
                    <div class="text-gray-500 text-center">
                        Нет изображения
                    </div>
                <?php endif; ?>

            </div>
        </a>

        <div class="p-5 flex flex-col flex-grow">

            <a href="<?php echo e(route('market.catalog.product', $product->slug)); ?>">
                <h2 class="text-lg font-bold text-white hover:text-amber-400 transition min-h-[56px]">
                    <?php echo e($product->name); ?>

                </h2>
            </a>

            <p class="text-gray-300 text-sm mt-3 min-h-[60px]">
                <?php echo e(Str::limit($product->description, 90)); ?>

            </p>

            <div class="flex flex-wrap gap-2 mt-4">
                <?php if($product->brand): ?>
                    <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200 text-xs">
                        <?php echo e($product->brand->name); ?>

                    </span>
                <?php endif; ?>

                <?php if($product->category): ?>
                    <span class="px-3 py-1 rounded-full bg-white/10 text-gray-200 text-xs">
                        <?php echo e($product->category->name); ?>

                    </span>
                <?php endif; ?>
            </div>

            <div class="mt-4 text-sm text-gray-300">
                Артикул:
                <span class="font-semibold text-white">
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

            <div class="mt-auto pt-5 flex flex-col gap-3">

                <a href="<?php echo e(route('market.catalog.product', $product->slug)); ?>"
                   class="w-full text-center py-3 border border-white/20 rounded-xl text-white hover:border-amber-500 transition">
                    Открыть
                </a>

                <form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="quantity" value="1">

                    <button type="submit"
                            class="w-full py-3 bg-amber-500 text-black rounded-xl font-semibold hover:scale-[1.02] transition">
                        Добавить в корзину
                    </button>

                </form>

            </div>

        </div>

    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/resources/views/market/_cards.blade.php ENDPATH**/ ?>
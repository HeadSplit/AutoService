<?php $__env->startSection('main'); ?>

    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid lg:grid-cols-3 gap-8">

            
            <div class="lg:col-span-1">

                <div class="bg-[#111] border border-white/10 rounded-3xl p-8">

                    <div class="flex flex-col items-center">

                        <img
                            src="<?php echo e($user->image ?? asset('images/default-avatar.png')); ?>"
                            alt="avatar"
                            class="w-52 h-52 rounded-full object-cover border-4 border-amber-500/30">

                        <h2 class="mt-6 text-2xl font-semibold">
                            <?php echo e(auth()->user()->name); ?>

                        </h2>

                        <p class="text-gray-500 mt-2">
                            <?php echo e(auth()->user()->email); ?>

                        </p>

                    </div>

                    <form
                        action="<?php echo e(route('upload')); ?>"
                        method="POST"
                        enctype="multipart/form-data"
                        class="mt-8">

                        <?php echo csrf_field(); ?>

                        <label class="block text-sm text-gray-400 mb-3">
                            Новая фотография
                        </label>

                        <input
                            type="file"
                            name="avatar"
                            accept="image/*"
                            class="block w-full text-sm text-gray-400
                        file:mr-4
                        file:py-3
                        file:px-4
                        file:rounded-xl
                        file:border-0
                        file:bg-amber-500
                        file:text-black
                        file:font-medium">

                        <button
                            type="submit"
                            class="w-full mt-4 py-3 rounded-xl bg-amber-500 text-black font-semibold hover:scale-[1.02] transition">

                            Загрузить фото

                        </button>

                    </form>

                    <form
                        action="<?php echo e(route('deleteImage')); ?>"
                        method="POST"
                        class="mt-3">

                        <?php echo csrf_field(); ?>

                        <button
                            type="submit"
                            class="w-full py-3 rounded-xl border border-red-500/30 text-red-400 hover:bg-red-500/10 transition">

                            Удалить фото

                        </button>

                    </form>

                </div>

            </div>

            
            <div class="lg:col-span-2">

                
                <div class="flex items-center justify-between mb-8">

                    <h1 class="text-3xl font-bold text-white">
                        Мои заказы (СТО)
                    </h1>

                    <span class="text-gray-500">
            <?php echo e(count($orders)); ?> заказов
        </span>

                </div>

                <?php if(count($orders)): ?>

                    <div class="grid md:grid-cols-2 gap-6 mb-12">

                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="bg-[#111] border border-white/10 rounded-3xl overflow-hidden hover:border-amber-500/30 transition">

                                <img
                                    src="<?php echo e($order->image); ?>"
                                    alt=""
                                    class="w-full h-52 object-cover">

                                <div class="p-6">

                                    <h3 class="text-xl font-semibold mb-3 text-white">
                                        <?php echo e($order->mark); ?> <?php echo e($order->model); ?>

                                    </h3>

                                    <p class="text-gray-500 mb-6">
                                        <?php echo e($order->description); ?>

                                    </p>

                                    <a href="<?php echo e(route('show-order', [$order->uuid])); ?>"
                                       class="inline-flex items-center px-5 py-3 bg-amber-500 text-black rounded-xl font-medium">

                                        Подробнее

                                    </a>

                                </div>

                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                <?php else: ?>

                    <div class="bg-[#111] border border-white/10 rounded-3xl p-8 text-center mb-12">

                        <h2 class="text-xl font-semibold text-white mb-2">
                            СТО заказов нет
                        </h2>

                        <p class="text-gray-500">
                            Вы ещё не оставляли заявки на обслуживание
                        </p>

                    </div>

                <?php endif; ?>


                
                <div class="flex items-center justify-between mb-8">

                    <h1 class="text-3xl font-bold text-white">
                        Мои заказы (Магазин)
                    </h1>

                    <span class="text-gray-500">
            <?php echo e(count($marketOrders)); ?> заказов
        </span>

                </div>

                <?php if(count($marketOrders)): ?>

                    <div class="grid md:grid-cols-2 gap-6">

                        <?php $__currentLoopData = $marketOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="bg-[#111] border border-white/10 rounded-3xl p-6 hover:border-amber-500/30 transition">

                                <div class="mb-4">

                                    <h3 class="text-xl font-semibold text-white">
                                        Заказ #<?php echo e($order->id); ?>

                                    </h3>

                                    <p class="text-gray-500 text-sm mt-1">
                                        Статус: <?php echo e($order->status); ?>

                                    </p>

                                </div>

                                <div class="text-sm text-gray-400 space-y-1 mb-5">

                                    <div>
                                        Товаров: <?php echo e($order->items->count()); ?>

                                    </div>

                                    <div>
                                        Сумма: <?php echo e(number_format($order->total, 0, ',', ' ')); ?> ₽
                                    </div>

                                </div>

                                <a href="<?php echo e(route('custom.show', $order->id)); ?>"
                                   class="inline-flex items-center px-5 py-3 bg-amber-500 text-black rounded-xl font-medium">

                                    Подробнее

                                </a>

                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                <?php else: ?>

                    <div class="bg-[#111] border border-white/10 rounded-3xl p-8 text-center">

                        <h2 class="text-xl font-semibold text-white mb-2">
                            Маркет заказов нет
                        </h2>

                        <p class="text-gray-500">
                            Вы ещё не оформляли покупки в магазине
                        </p>

                    </div>

                <?php endif; ?>

            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/pages/profile.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Управление заказами'); ?>

<?php $__env->startSection('main'); ?>

    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="flex justify-between items-center mb-10">

            <div>

                <h1 class="text-4xl font-bold text-white">
                    Заказы клиентов
                </h1>

                <p class="text-gray-500 mt-2">
                    Управление всеми заказами
                </p>

            </div>

            <div class="bg-[#111] px-5 py-3 rounded-2xl border border-white/10">

            <span class="text-gray-400">
                Всего заказов:
            </span>

                <span class="text-amber-500 font-bold">
                <?php echo e($customs->total()); ?>

            </span>

            </div>

        </div>

        <?php if(session('success')): ?>

            <div class="mb-6 p-4 rounded-2xl bg-green-500/10 border border-green-500/30 text-green-400">
                <?php echo e(session('success')); ?>

            </div>

        <?php endif; ?>

        <div class="bg-[#111] border border-white/10 rounded-3xl overflow-hidden">

            <table class="w-full">

                <thead>

                <tr class="border-b border-white/10 text-left">

                    <th class="p-5">#</th>
                    <th class="p-5">Клиент</th>
                    <th class="p-5">Статус</th>
                    <th class="p-5">Дата</th>
                    <th class="p-5">Действия</th>

                </tr>

                </thead>

                <tbody>

                <?php $__currentLoopData = $customs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr
                        class="border-b border-white/5 hover:bg-white/[0.02] transition-all duration-300">

                        <td class="p-5">
                            <?php echo e($custom->id); ?>

                        </td>

                        <td class="p-5">
                            <?php echo e($custom->user?->name); ?>

                        </td>

                        <td class="p-5">

                            <?php if($custom->status === 'new'): ?>

                                <span class="px-3 py-1 rounded-full bg-blue-500/20 text-blue-400">
                                Новый
                            </span>

                            <?php elseif($custom->status === 'in_progress'): ?>

                                <span class="px-3 py-1 rounded-full bg-amber-500/20 text-amber-400">
                                В работе
                            </span>

                            <?php else: ?>

                                <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-400">
                                Завершён
                            </span>

                            <?php endif; ?>

                        </td>

                        <td class="p-5">
                            <?php echo e($custom->created_at->format('d.m.Y H:i')); ?>

                        </td>

                        <td class="p-5">

                            <div class="flex gap-2">

                                <a
                                    href="<?php echo e(route('custom.show', $custom)); ?>"
                                    class="px-4 py-2 bg-amber-500 text-black rounded-xl font-medium hover:scale-105 transition">

                                    Открыть

                                </a>

                                <a
                                    href="<?php echo e(route('custom.edit', $custom)); ?>"
                                    class="px-4 py-2 border border-blue-500/30 text-blue-400 rounded-xl hover:bg-blue-500/10 transition">

                                    Изменить

                                </a>

                                <form
                                    action="<?php echo e(route('custom.destroy', $custom)); ?>"
                                    method="POST">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        onclick="return confirm('Удалить заказ?')"
                                        class="px-4 py-2 border border-red-500/30 text-red-400 rounded-xl hover:bg-red-500/10 transition">

                                        Удалить

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>

        <div class="mt-8">

            <?php echo e($customs->links()); ?>


        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/custom/index.blade.php ENDPATH**/ ?>
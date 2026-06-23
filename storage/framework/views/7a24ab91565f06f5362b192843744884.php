<?php $__env->startSection('main'); ?>

    <div class="max-w-2xl mx-auto px-6 py-12">

        <div class="bg-[#111] border border-white/10 rounded-3xl p-8">

            <h1 class="text-3xl font-bold mb-8">
                Редактирование заказа #<?php echo e($custom->id); ?>

            </h1>

            <form
                action="<?php echo e(route('custom.update', $custom)); ?>"
                method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <label class="block mb-3 text-gray-400">
                    Статус заказа
                </label>

                <select
                    name="status"
                    class="w-full bg-black border border-white/10 rounded-2xl p-4">

                    <option
                        value="new"
                        <?php if($custom->status === 'new'): echo 'selected'; endif; ?>>

                        Новый

                    </option>

                    <option
                        value="in_progress"
                        <?php if($custom->status === 'in_progress'): echo 'selected'; endif; ?>>

                        В работе

                    </option>

                    <option
                        value="completed"
                        <?php if($custom->status === 'completed'): echo 'selected'; endif; ?>>

                        Завершён

                    </option>

                </select>

                <button
                    class="mt-6 w-full py-4 bg-amber-500 text-black rounded-2xl font-semibold">

                    Сохранить

                </button>

            </form>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/custom/edit.blade.php ENDPATH**/ ?>
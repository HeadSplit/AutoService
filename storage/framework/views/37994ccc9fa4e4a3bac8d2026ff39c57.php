<?php $__env->startSection('main'); ?>

    <div class="max-w-2xl mx-auto px-6 py-10 text-white">

        <h1 class="text-2xl font-semibold mb-6">Создать бренд</h1>

        <form method="POST" action="<?php echo e(route('market.admin.brands.store')); ?>"
              class="bg-[#111] border border-white/10 rounded-2xl p-6 space-y-4">

            <?php echo csrf_field(); ?>

            <div>
                <label class="text-sm text-gray-400">Название</label>
                <input type="text" name="name"
                       class="w-full mt-1 p-3 bg-black border border-white/10 rounded-xl text-white">
            </div>

            <div>
                <label class="text-sm text-gray-400">Slug(необязательно)</label>
                <input type="text" name="slug"
                       class="w-full mt-1 p-3 bg-black border border-white/10 rounded-xl text-white">
            </div>

            <div>
                <label class="text-sm text-gray-400">Страна</label>
                <input type="text" name="country"
                       class="w-full mt-1 p-3 bg-black border border-white/10 rounded-xl text-white">
            </div>

            <button class="w-full py-3 bg-amber-500 text-black rounded-xl font-medium">
                Создать
            </button>

        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.market.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/market/admin/brand/create.blade.php ENDPATH**/ ?>
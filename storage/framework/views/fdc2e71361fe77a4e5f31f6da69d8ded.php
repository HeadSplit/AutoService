<?php $__env->startSection('main'); ?>
    <h1 style="color: #FFFFFF; text-align: center; padding: 20px 0">Мои задачи</h1>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 0 20px;">
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="background: #e44f12; color: #fff; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(234,2,2,0.5);">
                <h3 style="margin-bottom: 10px;"><?php echo e($order->full_name_client); ?></h3>
                <p><strong>Авто:</strong> <?php echo e($order->mark); ?> <?php echo e($order->model); ?></p>
                <p><strong>Гос.номер:</strong> <?php echo e($order->state_number); ?> <?php echo e($order->region); ?></p>
                <p><strong>Цена:</strong> <?php echo e($order->price ?? 'Не указана'); ?> ₽</p>
                <p><strong>Услуга:</strong> <?php echo e($order->description ?? 'Нет описания'); ?></p>
                <p><strong>Статус:</strong> <?php echo e($order->status); ?></p>
                <p><strong>Срок:</strong> <?php echo e(\Carbon\Carbon::parse($order->EndTime)->format('d.m.Y')); ?></p>
                <a href="<?php echo e(route('order.edit', $order->id)); ?>" class="btn btn-sm btn-primary" style="margin-top: 10px;">Открыть</a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/polzovatel/PhpstormProjects/AutoService/resources/views/pages/my_tasks.blade.php ENDPATH**/ ?>
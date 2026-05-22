<?php $__env->startSection('main'); ?>

        <div class="container d-flex" data-bs-theme="dark" style="color: #FFFFFF; padding: 30px 0">
            <div>
                <h1>Профиль</h1>
                <img style="width: 400px; height: 400px; border-radius: 50%;"
                     src="<?php echo e(isset($user) && $user->image ? asset('storage/' . $user->image) : asset('storage/uploads/avatars/default.jpg')); ?>">

                <form action="<?php echo e(route('upload')); ?>" method="post" class="mb-3" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input class="form-control-file" type="file" id="avatar" name="avatar">
                    <button type="submit" class="btn btn-success">Загрузить</button>
                </form>
                <form action="<?php echo e(route('deleteImage')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            <div>
                <h2>Здравствуйте, <?php echo e($user->name); ?></h2>
                <h3>Ваша роль: <?php echo e($user->role); ?></h3>
                <div style="display: flex; flex-direction: column; width: 15%; gap: 20px;">
                    <form action="<?php echo e(route('logout')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Выход</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="container" data-bs-theme="dark" style="color: #FFFFFF; padding: 30px 0">
            <h1>Ваши заказы</h1>
            <?php if(count($orders) > 0): ?>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card" data-bs-theme="dark" style="width: 25rem;">
                    <img src="<?php echo e(asset('storage/' . $order->image)); ?>" class="card-img-top" alt="Изображение заказа">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($order->description); ?></h5>
                        <p class="card-text"><?php echo e($order->mark . ' ' . $order->model); ?></p>
                        <a href="<?php echo e(route('show-order', [$order->uuid])); ?>" class="btn btn-primary">Уточнить статус</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="container" align="center">
                <h3>Вы ещё не сделали ни одного заказа</h3>
                </div>
            <?php endif; ?>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/polzovatel/PhpstormProjects/AutoService/resources/views/pages/profile.blade.php ENDPATH**/ ?>
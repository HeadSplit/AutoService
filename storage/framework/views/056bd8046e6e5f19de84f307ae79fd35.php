<?php $__env->startSection('main'); ?>

    
    <section class="relative h-[650px] overflow-hidden">

        <img
            src="<?php echo e(asset('images/1.jpg')); ?>"
            alt="СТО Восточный"
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-black/70"></div>

        <div class="relative z-10 h-full flex items-center justify-center text-center px-6">

            <div>

                <h1 class="text-5xl md:text-7xl font-bold text-white">
                    СТО Восточный
                </h1>

                <p class="mt-6 text-xl text-gray-300 max-w-2xl">
                    Профессиональный ремонт, диагностика и обслуживание автомобилей любых марок
                </p>

                <a href="<?php echo e(route('create')); ?>"
                   class="inline-block mt-8 px-6 py-3 bg-amber-500 text-black font-semibold rounded-xl hover:scale-105 transition">

                    Оставить заявку

                </a>

            </div>

        </div>

    </section>

    
    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="text-center mb-14">

            <h2 class="text-4xl md:text-5xl font-bold text-white">
                ЛЮБЫЕ ВИДЫ УСЛУГ
            </h2>

            <h3 class="text-4xl md:text-5xl font-bold text-amber-500 mt-2">
                ДЛЯ ВАШЕГО АВТО
            </h3>

        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            
            <div class="bg-gradient-to-br from-orange-300 via-red-500 to-red-700 rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-300">

                <img
                    src="<?php echo e(asset('images/diagnos.jpg')); ?>"
                    alt="Диагностика двигателя"
                    class="w-full h-56 object-cover">

                <div class="p-6 text-white">

                    <h4 class="text-xl font-semibold mb-3">
                        Диагностика и ремонт двигателя
                    </h4>

                    <p class="text-white/90">
                        Профессиональная компьютерная диагностика, капитальный ремонт двигателей любой сложности,
                        замена ГРМ и устранение течей.
                    </p>

                </div>

            </div>

            
            <div class="bg-gradient-to-br from-orange-300 via-red-500 to-red-700 rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-300">

                <img
                    src="<?php echo e(asset('images/TO.jpg')); ?>"
                    alt="ТО"
                    class="w-full h-56 object-cover">

                <div class="p-6 text-white">

                    <h4 class="text-xl font-semibold mb-3">
                        Техническое обслуживание
                    </h4>

                    <p class="text-white/90">
                        Регулярное ТО по регламенту производителя, замена масла и фильтров,
                        обслуживание тормозной системы и ходовой части.
                    </p>

                </div>

            </div>

            
            <div class="bg-gradient-to-br from-orange-300 via-red-500 to-red-700 rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-300">

                <img
                    src="<?php echo e(asset('images/repair.jpg')); ?>"
                    alt="Электрика"
                    class="w-full h-56 object-cover">

                <div class="p-6 text-white">

                    <h4 class="text-xl font-semibold mb-3">
                        Ремонт электрооборудования
                    </h4>

                    <p class="text-white/90">
                        Диагностика и устранение неисправностей электросистем,
                        ремонт стартеров, генераторов и блоков управления.
                    </p>

                </div>

            </div>

            
            <div class="bg-gradient-to-br from-orange-300 via-red-500 to-red-700 rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-300">

                <img
                    src="<?php echo e(asset('images/paint.jpg')); ?>"
                    alt="Кузовной ремонт"
                    class="w-full h-56 object-cover">

                <div class="p-6 text-white">

                    <h4 class="text-xl font-semibold mb-3">
                        Кузовной ремонт и покраска
                    </h4>

                    <p class="text-white/90">
                        Восстановление геометрии кузова, удаление вмятин,
                        профессиональная покраска и полировка автомобиля.
                    </p>

                </div>

            </div>

            
            <div class="bg-gradient-to-br from-orange-300 via-red-500 to-red-700 rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-300">

                <img
                    src="<?php echo e(asset('images/shini.avif')); ?>"
                    alt="Шиномонтаж"
                    class="w-full h-56 object-cover">

                <div class="p-6 text-white">

                    <h4 class="text-xl font-semibold mb-3">
                        Шиномонтаж и балансировка
                    </h4>

                    <p class="text-white/90">
                        Сезонная замена шин, балансировка колес, ремонт проколов,
                        подбор и продажа новых шин и дисков.
                    </p>

                </div>

            </div>

            
            <div class="bg-gradient-to-br from-orange-300 via-red-500 to-red-700 rounded-3xl overflow-hidden shadow-xl hover:scale-105 transition duration-300">

                <img
                    src="<?php echo e(asset('images/dopka.jpg')); ?>"
                    alt="Доп оборудование"
                    class="w-full h-56 object-cover">

                <div class="p-6 text-white">

                    <h4 class="text-xl font-semibold mb-3">
                        Установка дополнительного оборудования
                    </h4>

                    <p class="text-white/90">
                        Монтаж сигнализаций, парктроников,
                        камер заднего вида и другого оборудования.
                    </p>

                </div>

            </div>

        </div>

        <div class="flex justify-center mt-14">

            <a href="<?php echo e(route('create')); ?>"
               class="px-6 py-3 bg-amber-500 text-black font-semibold rounded-xl hover:scale-105 transition">

                Оставить заявку

            </a>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/pages/index.blade.php ENDPATH**/ ?>
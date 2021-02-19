<?php $__env->startSection('content'); ?>
    <div class="uk-container">
        <article class="uk-article">
            <h1 class="uk-article-title uk-text-center uk-margin-top">Созданный CSV файл</h1>
            <div class="uk-flex uk-flex-middle uk-flex-column uk-margin-top">
                <div>Обработан файл: <?php echo e($exel_name); ?></div>
                <div>Добавлено товаров: <?php echo e($product_count); ?></div>
                <div>Добавлено вариаций: <?php echo e($variation_count); ?></div>
            </div>
            <div class="uk-flex uk-flex-center uk-margin-top">
                <p>Создан файл: result.csv</p>
            </div>
            <div class="uk-flex uk-flex-center uk-margin-top">
                <a href="/tmp_csv/result.csv" class="uk-button uk-button-primary" download>Скачать CSV</a>
            </div>
        </article>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="uk-container">
        <article class="uk-article">
            <h1 class="uk-article-title uk-text-center uk-margin-top">Обработанные изображения</h1>
            <div class="errors-list">
                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-errors uk-alert-danger" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>Ошибка загрузки файла <strong><?php echo e($error['file']); ?></strong>. <?php echo e($error['message']); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="uk-flex uk-flex-center uk-margin-top">
                <label for="files">Список бработанных изображений</label>
            </div>
            <div class="uk-flex uk-flex-center uk-margin-top">
                <div class="images-files-list uk-flex-between">
                    <div class="image-item image-header uk-flex">
                        <div class="images-field">Изображение файла</div>
                        <div class="images-field">Название файла</div>
                        <div class="images-field">Размер файла</div>
                    </div>
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="image-item image-desc uk-flex">
                        <div class="images-field image-preview">
                            <img src="<?php echo e($image['path']); ?>">
                        </div>
                        <div class="images-field"><?php echo e($image['name']); ?></div>
                        <div class="images-field"><?php echo e($image['size']); ?> Kb</div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="uk-flex uk-flex-center uk-margin-top uk-margin-bottom">
                <a target="_blank" id="download_images" href="/images-download" class="uk-button uk-button-primary" download>Скачать файлы</a>
            </div>
        </article>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
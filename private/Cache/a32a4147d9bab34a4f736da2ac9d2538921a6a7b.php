<?php $__env->startSection('content'); ?>
    <div class="uk-container">
        <article class="uk-article">
            <h1 class="uk-article-title uk-text-center uk-margin-top">Обработка Exel прайса</h1>
            <form action="/csv-upload" method="post" enctype="multipart/form-data">
                <input class="hide-input" id="exel" name="exel" type="file">
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <label for="exel-fil">Выберите обрабатываемые Exel файл</label>
                </div>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <button id="exel-file" class="uk-button uk-button-primary">Выбрать файл</button>
                </div>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <p>Выбран файл: <span class="exel-name">не выбран</span></p>
                </div>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <button class="uk-button uk-button-primary" type="submit">Создать CSV</button>
                </div>
            </form>
        </article>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
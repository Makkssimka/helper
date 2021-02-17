@extends('layout')

@section('content')
    <div class="uk-container">
        <article class="uk-article">
            <h1 class="uk-article-title uk-text-center uk-margin-top">Пакетная обработка изображений</h1>
            <form action="/images-upload" method="post" enctype="multipart/form-data">
                <input class="hide-input" id="files" name="files[]" type="file" multiple>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <label for="">Префикс для имени изображения</label>
                </div>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <input id="image-prefix" name="prefix" type="text" class="uk-input uk-form-width-medium" placeholder="stels-200">
                </div>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <label for="files">Выберите обрабатываемые изображения</label>
                </div>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <button id="select-file" class="uk-button uk-button-primary">Выбрать файлы</button>
                </div>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <div class="images-files-list uk-flex-between">
                        <div class="image-item image-header uk-flex">
                            <div class="images-field">Название файла</div>
                            <div class="images-field">Размер файла</div>
                            <div class="images-field">Новое имя после обработки</div>
                        </div>
                    </div>
                </div>
                <div class="uk-flex uk-flex-center uk-margin-top">
                    <button id="select-file" class="uk-button uk-button-primary" type="submit">Обработать изображения</button>
                </div>
            </form>
        </article>
    </div>
@endsection
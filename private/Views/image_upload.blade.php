@extends('layout')

@section('content')
    <div class="uk-container">
        <article class="uk-article">
            <h1 class="uk-article-title uk-text-center uk-margin-top">Обработанные изображения</h1>
            <div class="errors-list">
                @foreach($errors as $error)
                    <div class="item-errors uk-alert-danger" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>Ошибка загрузки файла <strong>{{ $error['file'] }}</strong>. {{ $error['message'] }}</p>
                    </div>
                @endforeach
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
                    @foreach($images as $image)
                    <div class="image-item image-desc uk-flex">
                        <div class="images-field image-preview">
                            <img src="{{ $image['path'] }}">
                        </div>
                        <div class="images-field">{{ $image['name'] }}</div>
                        <div class="images-field">{{ $image['size'] }} Kb</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="uk-flex uk-flex-center uk-margin-top uk-margin-bottom">
                <a target="_blank" id="download_images" href="/images-download" class="uk-button uk-button-primary" download>Скачать файлы</a>
            </div>
        </article>
    </div>
@endsection
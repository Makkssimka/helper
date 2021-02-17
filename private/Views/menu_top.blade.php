<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
            <li class="{{ $url_current == "/" ? 'uk-active' : '' }}">
                <a href="/">Главная</a>
            </li>
            <li class="{{ $url_current == "/images-create" ? 'uk-active' : '' }}">
                <a href="/images-create">Создание изображений</a>
            </li>
            <li class="{{ $url_current == "/csv-create" ? 'uk-active' : '' }}">
                <a href="/csv-create">Создание CSV</a>
            </li>
        </ul>
    </div>
</nav>
<?php


namespace core;

use Philo\Blade\Blade;

class App
{
    public static function view($view, $data = array())
    {
        $views = __DIR__ . '/../private/Views';
        $cache = __DIR__ . '/../private/Cache';

        $blade = new Blade($views, $cache);
        echo $blade->view()->make($view, $data)->render();
    }
}
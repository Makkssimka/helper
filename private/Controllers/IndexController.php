<?php


namespace Controllers;

use core\App;
use Core\Router;

class IndexController
{
    public function index()
    {
        $data = array();

        $data['title'] = 'Помощник для сайта';
        $data['url_current'] = Router::current();

        App::view('index', $data);
    }
}
<?php


namespace Controllers;


use core\Request;

class ApiController
{
    function loadPrice() {
        $type = Request::get('type');
        $string = "<request><date>".date('d-m-Y h:m', time())."</date><string>Загрузка $type</string></request>";
        $login = Request::get('login');
        //$password = Request::get('password');
        file_put_contents('data/result.xml', $string, FILE_APPEND);
    }

    function showPrice() {
        $result = file_get_contents('data/result.xml');
        var_dump($result);
    }
}
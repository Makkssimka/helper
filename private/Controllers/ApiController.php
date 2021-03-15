<?php


namespace Controllers;


use core\Request;

class ApiController
{
    function loadPrice() {
        $type = Request::get('type');
        $string = "<request><date>".date('d-m-Y h:m', time())."</date><string>Загрузка $type</string></request>";
        file_put_contents('data/result.xml', $string, FILE_APPEND);
        $val = md5(time());
        setcookie('hash', $val);
        echo "success\nhash\n$val";
    }

    function showPrice() {
        $result = file_get_contents('data/result.xml');
        var_dump($result);
    }
}
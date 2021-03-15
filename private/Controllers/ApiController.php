<?php


namespace Controllers;


use core\Request;

class ApiController
{
    function loadPrice() {
        $mode = Request::get('mode');
        $string = date('d-m-Y H:i', time())."Загрузка данных с сайта".PHP_EOL;
        file_put_contents('data/load.log', $string, FILE_APPEND);
        if ($mode == 'checkauth') {
            $val = md5(time());
            setcookie('hash', $val);
            echo "success\nhash\n$val";
        }
    }

    function showPrice() {
        $result = file_get_contents('data/load.log');
        var_dump($result);
    }
}
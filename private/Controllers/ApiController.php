<?php


namespace Controllers;


use core\Request;

class ApiController
{
    function loadPrice() {
        $mode = Request::get('mode');
        if ($mode == 'checkauth') {
            $string = date('d-m-Y H:i', time())." Начало загрузки".PHP_EOL;
            $val = md5(time());
            setcookie('hash', $val);
            echo "success\nhash\n$val";
        } elseif ($mode == 'init') {
            $string = date('d-m-Y H:i', time())." Передача параметров".PHP_EOL;
            echo "zip=yes\nfile_limit=52428800";
        } elseif ($mode == 'file') {
            $string = date('d-m-Y H:i', time())." Получение файла".PHP_EOL;
            $file = "data/result.log";
            file_put_contents($file, Request::get('filename'));
        }
        file_put_contents('data/load.log', $string, FILE_APPEND);
    }

    function showPrice() {
        $result = file_get_contents('data/load.log');
        echo $result;
    }
}
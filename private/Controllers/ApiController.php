<?php


namespace Controllers;


use core\Request;

class ApiController
{
    function loadPrice() {
        $mode = Request::get('mode');

        ob_start();
        if ($mode == 'checkauth') {
            $string = date('d-m-Y H:i', time())." Начало загрузки".PHP_EOL;
            file_put_contents('data/load.log', $string, FILE_APPEND);
            $val = md5(time());
            setcookie('hash', $val);
            echo "success\n";
            echo "hash\n";
            echo "$val\n";
        } elseif ($mode == 'init') {
            $string = date('d-m-Y H:i', time())." Передача параметров".PHP_EOL;
            file_put_contents('data/load.log', $string, FILE_APPEND);
            echo "zip=no\n";
            echo "file_limit=52428800\n";
        } elseif ($mode == 'file') {
            $string = date('d-m-Y H:i', time()) . " Получение файла" . PHP_EOL;
            file_put_contents('data/load.log', $string, FILE_APPEND);

            $filename = Request::get('filename');
            $string = date('d-m-Y H:i', time()) . " Загружен файл " . $filename . PHP_EOL;
            file_put_contents('data/load.log', $string . PHP_EOL, FILE_APPEND);
            $date = file_get_contents("php://input");
            file_put_contents('data/'.$filename ,$date);
        }
        $contents = ob_get_contents();
        ob_end_clean();

        header("Content-Type: text/html; charset=windows-1251");
        echo $contents;
        die();
    }

    function showPrice() {
        $result = file_get_contents('data/import0_1.xml');
        echo $result;
    }
}
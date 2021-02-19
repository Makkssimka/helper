<?php


namespace Controllers;

use classes\PriceList;
use core\App;
use core\Request;
use Core\Router;

class ExelController
{
    public function createCsv()
    {
        $data = array();

        $data['title'] = 'Обработка Exel прайса';
        $data['url_current'] = Router::current();

        App::view('csv_create', $data);
    }

    public function uploadCsv()
    {
        $data = array();

        $data['title'] = 'Созданный CSV файл';
        $data['url_current'] = Router::current();

        $exel = Request::file('exel');

        $price_generator = new PriceList($exel);
        $price_generator->run();

        $data['exel_name'] = $exel['name'];
        $data['product_count'] = $price_generator->getCountProduct();
        $data['variation_count'] = $price_generator->getCountVariation();

        App::view('csv_upload', $data);
    }
}
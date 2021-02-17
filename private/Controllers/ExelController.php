<?php


namespace Controllers;

use core\App;

class ExelController
{
    public function createCsv()
    {
        //print_r("Hello CreateCsv");
        $data = array();

        $data['title'] = 'Hello';
        App::view('exel_create', $data);
    }
}
<?php


namespace Controllers;

use core\App;

class ErrorController
{
    public function error_not_found() {
        $data = array();

        $data['title'] = 'Старница не найдена';
        App::view('404_error', $data);
    }
}
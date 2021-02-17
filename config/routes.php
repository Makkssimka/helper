<?php

$routes = array(
    '/' => 'Index@index',

    '/exel-create'      => 'Exel@create',
    '/scv-create'       => 'Exel@createCsv',

    '/images-create'    => 'Image@index',
    '/images-upload'    =>  'Image@upload',
    '/images-download'    =>  'Image@download',

);
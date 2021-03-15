<?php

$routes = array(
    '/' => 'Index@index',

    '/csv-create'       => 'Exel@createCsv',
    '/csv-upload'       => 'Exel@uploadCsv',

    '/images-create'    => 'Image@index',
    '/images-upload'    => 'Image@upload',
    '/images-download'  => 'Image@download',

    '/load-price/1c_exchange.php'       => 'Api@loadPrice',
    '/show-price'       => 'Api@showPrice'

);
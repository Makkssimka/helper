<?php


namespace Controllers;


use classes\Images;
use core\App;
use core\Request;
use Core\Router;
use ZipStream\Option\Archive;
use ZipStream\ZipStream;

class ImageController
{
    public function index()
    {
        $data = array();

        $data['title'] = 'Пакетная обработка изображений';
        $data['url_current'] = Router::current();

        App::view('image_create', $data);
    }

    public function upload()
    {
        $data = array();

        $data['title'] = 'Обработанные изображения';
        $data['url_current'] = Router::current();

        foreach (glob("tmp/*.*") as $file) {
            unlink($file);
        }

        $prefix = Request::get('prefix');
        $files = Request::files('files');
        $images = new Images($files);
        $images->save($prefix);

        $data['images'] = $images->get();
        $data['errors'] = $images->getErrors();
        App::view('image_upload', $data);
    }

    public function download()
    {
        $options = new Archive();
        $options->setSendHttpHeaders(true);

        $zip = new ZipStream('images.zip', $options);
        foreach (glob("tmp/*.*") as $file) {
            $info = pathinfo($file);
            $zip->addFileFromPath($info['basename'], $file);
            unlink($file);
        }

        $zip->finish();
    }
}
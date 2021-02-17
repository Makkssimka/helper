<?php


namespace classes;

class Images
{
    private $files = array();
    private $result_files = array();
    private $errors = array();
    private $path = 'tmp_images/';

    public function __construct($files)
    {
        foreach ($files as $file) {
            $path = $this->createImage($file);
            if ($path) {
                $file['path'] = $path;
            } else {
                $this->addError($file);
                continue;
            }
            array_push($this->files, $file);
        }
    }

    public function save($prefix)
    {
        foreach ($this->files as $file) {
            if ($this->isNotBorder($file)) {
                $file['path'] = $this->createGalleryImage($file['path']);
            } else {
                $file['path'] = $this->createCatalogImage($file['path']);
            }

            $path_name = $this->path.$prefix.'-'.$file['name'];
            switch ($file['type']) {
                case 'jpeg':
                case 'jpg':
                    imagejpeg($file['path'], $path_name);
                    break;
                case 'png':
                    imagepng($file['path'], $path_name);
                    break;
                default:
                    $this->errors[] = array(
                        'code' => 1,
                        'file' => $file['name']
                    );
            }

            array_push($this->result_files, array(
                'path' => $path_name,
                'name' => $prefix.'-'.$file['name'],
                'size' => round(filesize($path_name)/8/1000, 2)
            ));
        }
    }

    public function get()
    {
        return $this->result_files;
    }

    public function getErrors()
    {
        $code = array(
            1 => "Данный формат файла не поддерживается."
        );
        foreach ($this->errors as $index => $error) {
            $this->errors[$index]['message'] = $code[$error['code']];
        }
        return $this->errors;
    }

    private function createImage($file)
    {
        switch ($file['type']) {
            case 'jpeg':
            case 'jpg':
                $image_path = imagecreatefromjpeg($file['tmp_name']);
                break;
            case 'png':
                $image_path = imagecreatefrompng($file['tmp_name']);
                break;
            default:
                $image_path = '';
        }

        return $image_path;
    }

    private function createCatalogImage($file){
        $image_ratio = round(imagesx($file)/imagesy($file), 2);

        $new_height = 940;
        $new_width = round($new_height*$image_ratio, 0);

        $new_image = imagecreatetruecolor(1500, 1000);
        imagefill($new_image, 0, 0, 0xffffff);
        imagecopyresampled($new_image, $file, (1500-$new_width)/2, 30, 0, 0, $new_width, $new_height, imagesx($file), imagesy($file));

        return $new_image;
    }

    private function createGalleryImage($file){
        $image_ratio = round(imagesx($file)/imagesy($file), 2);
        $new_height = 1000;
        $new_width = round($new_height*$image_ratio, 0);

        $new_image = imagecreatetruecolor(1500, 1000);
        imagefill($new_image, 0, 0, 0xffffff);
        imagecopyresampled($new_image, $file, (1500-$new_width)/2, 0, 0, 0, $new_width, $new_height, imagesx($file), imagesy($file));

        return $new_image;
    }

    private function isNotBorder($file){
        $name = $file['name'];
        return mb_stripos($name, 'element') === false?false:true;
    }

    private function addError($file){
        $this->errors[] = array(
            'code' => 1,
            'file' => $file['name']
        );
    }
}
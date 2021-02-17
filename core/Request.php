<?php


namespace core;

class Request
{
    public static function get($name)
    {
        $result = filter_var($_REQUEST[$name], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
        return $result;
    }

    public static function files($name)
    {
        $result = array();
        $files = $_FILES[$name];
        $counter = count($files['name']);

        for ($i = 0; $i < $counter; $i++) {
            $result[] = array(
                'name' => $files['name'][$i],
                'tmp_name' => $files['tmp_name'][$i],
                'type' => explode("/",$files['type'][$i])[1]
            );
        }

        return $result;
    }
}
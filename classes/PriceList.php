<?php

namespace classes;

use PhpOffice\PhpSpreadsheet\IOFactory;

class PriceList
{
    private $exel_file;
    private $csv_file;
    private $product = 0;
    private $variation = 0;

    public function __construct($file)
    {
        $this->exel_file = $file;
        $this->csv_file = fopen("tmp_csv/result.csv", "w+");
    }

    public function run()
    {
        $this->addHeaderRow();
        $exel_file = $this->loadExelFile($this->exel_file['tmp_name']);
        $this->generateRows($exel_file);
        $this->closeFile();
    }

    public function getCountProduct()
    {
        return $this->product;
    }

    public function getCountVariation()
    {
        return $this->variation;
    }

    private function addHeaderRow()
    {
        $header_row = array(
            "Тип",
            "Артикул",
            "Имя",
            "Короткое описание",
            "Описание",
            "Категории",
            "Родительский",
            "Базовая цена",
            "Цена распродажи",
            "Запасы",
            "Имя атрибута 1",
            "Значение(-я) аттрибута(-ов) 1",
            "Глобальный атрибут 1",
            "Имя атрибута 2",
            "Значение(-я) аттрибута(-ов) 2",
            "Глобальный атрибут 2",
            "Имя атрибута 3",
            "Значение(-я) аттрибута(-ов) 3",
            "Глобальный атрибут 3",
            "Имя атрибута 4",
            "Значение(-я) аттрибута(-ов) 4",
            "Глобальный атрибут 4",
            "Имя атрибута 5",
            "Значение(-я) аттрибута(-ов) 5",
            "Глобальный атрибут 5",
            "Имя атрибута 6",
            "Значение(-я) аттрибута(-ов) 6",
            "Глобальный атрибут 6",
            "Имя атрибута 7",
            "Значение(-я) аттрибута(-ов) 7",
            "Глобальный атрибут 7",
            "Имя атрибута 8",
            "Значение(-я) аттрибута(-ов) 8",
            "Глобальный атрибут 8");

        fputcsv($this->csv_file, $header_row);
    }

    private function addRow($row){
        fputcsv($this->csv_file, $row);
    }

    private function generateRows($exel_file)
    {
        foreach ($exel_file as $index => $row) {
            if ($index == 0) continue;

            $main_colors = array();
            $main_frame_sizes = array();

            $main_name = $row[0];
            $main_art = $row[1];
            $main_short_desc = $row[2];
            $main_full_desc = $row[3];
            $main_category = $row[5];

            $full_option = explode(',', $row[7]);
            $main_brand = $full_option[0];
            $main_material = $full_option[1];
            $main_speed = $full_option[2];
            $main_tormoz = $this->transform_str('|', ', ', $full_option[3]);
            $main_type = $full_option[4];
            $main_wheel_size = $full_option[5];

            $full_variations = explode(';', $row[6]);
            foreach ($full_variations as $variation) {
                if (!$variation) continue;

                $variation_option_array = explode('|', $variation);
                $color_size = explode(',', $variation_option_array[1], 2);

                $main_colors[] = trim($color_size[0]);

                if (isset($color_size[1])) {
                    $main_frame_sizes[] = trim($color_size[1]);
                }
            }

            $main_array_row = array(
                'variable',
                $main_art,
                $main_name,
                $main_short_desc,
                $main_full_desc,
                $main_category,
                '',
                '',
                '',
                '',
                'Цвет',
                implode(', ', array_unique($main_colors)),
                '1',
                'Размер рамы',
                implode(', ', array_unique($main_frame_sizes)),
                '1',
                'Бренд',
                trim($main_brand),
                '1',
                'Тип',
                trim($main_type),
                '1',
                'Материал',
                trim($main_material),
                '1',
                'Тормоза',
                trim($main_tormoz),
                '1',
                'Количество скоростей',
                trim($main_speed),
                '1',
                'Размер колес',
                trim($main_wheel_size),
                '1');

            $this->addRow($main_array_row);
            $this->product++;

            $main_price = explode(',', $row[4]);
            foreach ($full_variations as $variation) {
                if (!$variation) continue;
                $variation_option_array = explode('|', $variation);
                $color_size = explode(',', $variation_option_array[1], 2);
                $frame_size = isset($color_size[1])?trim($color_size[1]):'';

                $variation_row = array(
                    'variation',
                    $variation_option_array[0],
                    $main_name,
                    '',
                    '',
                    '',
                    $main_art,
                    trim($main_price[0]),
                    trim($main_price[1]),
                    $variation_option_array[2],
                    'Цвет',
                    trim($color_size[0]),
                    '1',
                    'Размер рамы',
                    trim($frame_size),
                    '1');

                $this->addRow($variation_row);
                $this->variation++;
            }
        }
    }

    private function closeFile()
    {
        fclose($this->csv_file);
    }

    private function loadExelFile($file_path)
    {
        $spreadsheet = IOFactory::load($file_path);
        return $spreadsheet->getActiveSheet()->toArray();
    }

    private function transform_str($search, $replace, $str){
        $str_array = explode($search, $str);
        foreach ($str_array as $key => $value) {
            $str_array[$key] = trim($value);
        }

        return implode($replace, $str_array);
    }
}
<?php

namespace App\Services\Functions;

class Validator
{
    public static function checkboxValidator($data)
    {
        if (!isset($data)) {
            return $data = 'n';
        } else {
            return $data;
        }
    }
    public static function textValidator($data)
    {
        if ($data === '' or $data == '' or $data == false or $data == null) {
            die('Campo Vazio');
        } else {
            return $data;
        }
    }
}

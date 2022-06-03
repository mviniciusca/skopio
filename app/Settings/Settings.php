<?php

namespace App\Settings;

use PDO;

class Settings
{
    public $settings;
    public $service;

    public static function appSettings($service)
    {
        $settings = [
           'DB'    => [
                       'DB_HOST' =>  '172.21.0.3',
                       'DB_PSWD' =>  'example',
                       'DB_NAME' =>  'jobboard',
                       'DB_USER' =>  'root',
                       'DB_PORT' =>  '3306',
                       'DB_DRIV' =>  'mysql',
                       'DB_CHAR' =>  'utf8',
                       'DB_DOPT' =>  [
                                           PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                                           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                                       ]
                   ],
           'APP'   => [],
           'TWIG'  => [
                       'TEMPLATES_DIR' => '../src/Views/',
                       'CACHE_DIR'     => '../cache',
                       'CACHE_ENABLE'  => false,
                       'CACHE_TIME'    => 3600
                   ],
        ];
        return $settings[$service];
    }
}

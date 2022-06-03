<?php

namespace App\Database;

use App\Settings\Settings;
use PDO;
use PDOException;

class Database
{
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function dbSettings()
    {
        $dbSettings = Settings::appSettings('DB');
        return $dbSettings;
    }

    public function dbConnect()
    {
        try {
            $dbSettings = $this->dbSettings();
            $db = new PDO(
                $dbSettings['DB_DRIV'] . ':host=' . $dbSettings['DB_HOST'] . ';port=' . $dbSettings['DB_PORT'] .
                ';dbname=' . $dbSettings['DB_NAME'],
                $dbSettings['DB_USER'],
                $dbSettings['DB_PSWD']
            );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage() ;
            die();
        }
    }
}

<?php

namespace App\Connection;

use \PDO;

class MysqlConnection
{
    private static $pdoConnection = null;

    private function __construct()
    {
    }

    public static function getPdo(): PDO
    {
        if (self::$pdoConnection !== null) {
            return self::$pdoConnection;
        }
        try {
            if (self::$pdoConnection == null) {
                $dbconfig = parse_ini_file(__DIR__ . '../../../config/db.ini');
                self::$pdoConnection = new PDO('mysql:host=' . $dbconfig['host'] . ';' . 'dbname=' . $dbconfig['dbname'], $dbconfig['user']);
                self::$pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (\PDOException $ex) {
            throw $ex;
        }

        return self::$pdoConnection;
    }
}

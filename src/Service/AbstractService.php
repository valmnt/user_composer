<?php

namespace App\Service;

use App\Connection\MysqlConnection;

abstract class AbstractService
{
    protected $db;
    public function __construct()
    {
        $this->db = MysqlConnection::getPdo();
    }
}

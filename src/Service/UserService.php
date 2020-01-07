<?php

namespace App\Service;

use \PDO;

class UserService extends AbstractService
{
    public function findAll(): array
    {
        $querry = 'SELECT * FROM users';
        $result = $this->db->query($querry);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

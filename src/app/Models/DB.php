<?php

namespace App\Models;

use PDO;

class DB
{
    private $host = 'sqlite';
    private $path = __DIR__ . './../../database/instagram-api.db';
    protected $con;

    public function connect()
    {
        $this->con = new PDO(
            "$this->host:$this->path"
        );

        return $this->con;
    }
}

<?php

namespace App\Models;

use App\Models\DB;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }
}

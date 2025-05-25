<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Teste extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        $query = $db->query("SELECT * FROM clientes LIMIT 5");

        echo "<pre>";
        print_r($query->getResult());
    }
}

<?php

namespace App;

require __DIR__ . '/../vendor/autoload.php';
use App\Database;

class Authentication_model {

    private $conn;

    public function __construct()
    {
        $this->conn = new Database ();
    }

}

?>
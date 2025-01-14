<?php

namespace App;

use PDO;
use PDOException;

class Database extends PDO {

    private string $hostname = "127.0.0.1";
    private string $username = "root";
    private string $password = "";
    private string $database = "workout_wise";
    
    function __construct()
    {
        try {

            $dsn = "mysql:host={$this->hostname};dbname={$this->database}"; 

            parent::__construct($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}

?>
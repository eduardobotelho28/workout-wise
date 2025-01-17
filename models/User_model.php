<?php

namespace App;

use App\Database;
use PDO;

class User_model {

    private $conn;

    public function __construct()
    {
        $this->conn = new Database ();
    }

    public function get($id) {

        $stmt = $this->conn->prepare(
            "SELECT * FROM users
            WHERE id = :id"
        );

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }
 
}

?>
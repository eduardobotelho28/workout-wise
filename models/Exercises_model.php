<?php

namespace App;

use App\Database;
use PDO;

class Exercises_model {

    private $conn;

    public function __construct()
    {
        $this->conn = new Database ();
    }

    public function get_by_user($id) {

        $stmt = $this->conn->prepare(
            "SELECT * FROM exercises
            WHERE created_by = :created_by"
        );

        $stmt->bindParam(':created_by', $id, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function delete ($id) {
        $stmt = $this->conn->prepare("DELETE FROM exercises WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
 
}

?>
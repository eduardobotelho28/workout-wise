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

    public function insert ($name) {
        $stmt = $this->conn->prepare(
            "INSERT INTO exercises (name, created_by, create_at)
            VALUES (:name, :created_by, :create_at)"
        );
        $stmt->execute([
            'name'       => $name,
            'created_by' => $_SESSION['user'],
            'create_at'  => date('Y-m-d h:i:s')
        ]);
        return $stmt->rowCount() > 0;
    }

    public function get_all () {
        $user = $_SESSION['user'];
        $stmt = $this->conn->query("SELECT * FROM exercises WHERE created_by = $user");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
   
}

?>
<?php

namespace App;

use App\Database;

class Authentication_model {

    private $conn;

    public function __construct()
    {
        $this->conn = new Database ();
    }

    public function insert_user ($data) {

        $stmt = $this->conn->prepare("
            INSERT INTO users (name, email, password, created_at)
            VALUES (:name, :email, :password, :created_at);
        ");

        $stmt->execute([
            'name'       => $data['name']     ?? null,
            'email'      => $data['email']    ?? null,
            'password'   => $data['password'] ?? null,
            'created_at' => date('Y-m-d')
        ]);

        return $this->conn->lastInsertId() > 0;

    }

}

?>
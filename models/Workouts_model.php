<?php

namespace App;

use App\Database;
use PDO;

class Workouts_model {

    private $conn;

    public function __construct()
    {
        $this->conn = new Database ();
    }

    public function insert ($data) {
        
        try {
            
            $this->conn->beginTransaction();
    
            $stmt = $this->conn->prepare("
                INSERT INTO workouts (name, exercise, series, reps, weight, created_at, created_by)
                VALUES (:name, :exercise, :series, :reps, :weight, :created_at, :created_by)
            ");
    
            foreach ($data as $dt) {
                $stmt->execute([
                    ':name'       => $dt['name']        ,
                    ':exercise'   => $dt['exercise']    ,
                    ':series'     => $dt['series']      ,
                    ':reps'       => $dt['reps']        ,
                    ':weight'     => $dt['weight']      ,
                    ':created_at' => date('Y-m-d h:i:s'),
                    ':created_by' => $_SESSION['user']  ,
                ]);
            }
    
            $this->conn->commit();
    
            return true;
        } catch (\PDOException $e) {
            $this->conn->rollBack();
            throw new \Exception("Erro ao inserir exercícios: " . $e->getMessage());
        }

    }

    public function get_workouts_by_user () {
        
        $id = $_SESSION['user'];

        $stmt = $this->conn->query("SELECT workouts.*, exercises.name as exercise_name FROM workouts JOIN exercises ON workouts.exercise = exercises.id WHERE workouts.created_by = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function delete ($id) {
        $stmt = $this->conn->prepare("DELETE FROM workouts WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

}

?>
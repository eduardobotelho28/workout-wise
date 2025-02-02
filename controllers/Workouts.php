<?php

use App\BaseController;
use App\Workouts_model;

class Workouts extends BaseController {

    private $workouts_model;

    public function __construct () {
        $this->workouts_model = new Workouts_model();
        parent::__construct();
    }

    public function index () {
        
        require __DIR__ . '/../views/workouts.php' ;
    }

    public function save () {

        $this->validateHttpMethod("POST");

        $data = json_decode(file_get_contents('php://input'), true);

        $this->sanitize($data);

        try {

            $this->workouts_model->insert($data);

            $this->response([], 200, 'success');
            
        } catch (\Throwable $th) {
            $this->response([], 500, 'error');
        }

    }

    public function my_workouts () {

        $data = $this->workouts_model->get_workouts_by_user();

        $data_by_name = [];

        foreach ($data as $item) {
            $name = strtoupper($item['name']);
            $data_by_name[$name][] = $item;
        }

        require __DIR__ . '/../views/my_workouts.php' ;

    }

    public function delete_workout ($id) {  
        if($this->workouts_model->delete($id)) {
            header('Location: /workout-wise/workouts/my_workouts');
        }
    }
    
}

?>
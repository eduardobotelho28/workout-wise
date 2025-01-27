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
 
}

?>
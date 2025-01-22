<?php

use App\BaseController;
use App\Exercises_model;

class Exercises extends BaseController {

    private $exercises_model;

    public function __construct () {
        $this->exercises_model = new Exercises_model();
        parent::__construct();
    }

    public function index () {
        $data['exercises'] = $this->exercises_model->get_by_user($_SESSION['user']);
        if($data['exercises']) {
            extract($data);
        }
        require __DIR__ . '/../views/exercises.php' ;
    }

    public function insert ($name) {
        try {

            $this->sanitize($name);
            
            $name = urldecode($name);

            if($this->exercises_model->insert($name)) {
                $data['status'] = 'success';
                $this->response($data, 200, '');
            }
            

        } catch (\Throwable $th) {
            http_response_code(500);
            $data['message'] = $th->getMessage();
            echo json_encode($data);
        }
    }

    public function delete ($id) {

        try {
            
            if($this->exercises_model->delete($id)) {
                $data['status'] = 'success';
                echo json_encode($data);
            }

        } catch (\Throwable $th) {
            http_response_code(500);
            $data['message'] = $th->getMessage();
            echo json_encode($data);
        }
        
        
    }
    
}

?>
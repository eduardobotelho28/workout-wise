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
    
}

?>
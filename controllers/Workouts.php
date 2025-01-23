<?php

use App\BaseController;
// use App\Exercises_model;

class Workouts extends BaseController {

    private $exercises_model;

    public function __construct () {
        // $this->exercises_model = new Exercises_model();
        parent::__construct();
    }

    public function index () {
        
        require __DIR__ . '/../views/workouts.php' ;
    }
 
}

?>
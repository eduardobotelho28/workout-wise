<?php

use App\BaseController;

class Home extends BaseController {

    public function __construct () {
        parent::__construct();
    }

    public function index () {
        extract($this->userData);
        require __DIR__ . '/../views/home.php' ;
    }
    
}

?>
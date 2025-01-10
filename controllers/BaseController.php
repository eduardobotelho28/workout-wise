<?php

class BaseController {

    public function __construct () {

        //verify if user is logged.
        session_start();
        if(!isset($_SESSION['user'])) {
            header('Location: /workout-wise/authentication');
            exit;
        }
    }
}

?>
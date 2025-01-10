<?php

    class Authentication {

        public function index () {
            $this->open_login_page ();
        }

        public function open_login_page () {
            require __DIR__ . '/../views/login.php' ;
        }

        public function open_register_page () {
            require __DIR__ . '/../views/register.php' ;
        }

        public function login () {

        }

        public function register () {
            
        }

    }

?>
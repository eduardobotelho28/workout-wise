<?php

    require __DIR__ . '/../vendor/autoload.php';
    
    use App\Authentication_model;

    class Authentication {

        private $authentication_model;

        public function __construct(){
            $this->authentication_model = new Authentication_model();
        }

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

            $data = $_POST                       ;
            $this->sanitize($data)               ;

            $errors = $this->valid_input ($data) ;

            if(!empty($errors)) {
                $data['errors']  = $errors  ;
                $data['message'] = 'error'  ;
                die(json_encode($data));exit;
            }

            // $this->authentication_model->insert_user($data);
            
        }

        protected function sanitize(&$data) {
            if (is_array($data)) {
                foreach ($data as $key => &$value) {
                    $this->sanitize($value); 
                }
            } else {
                $data = htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
            }
            return $data;
        }

        private function valid_input ($data) {

            $errors = [];

            foreach ($data as $key => $value) {
                if($value === '') {
                    $errors[] = "$key deve ser preenchido";
                }
            }

            if($data['password'] != $data['confirm_password'] && !empty($data['password']) && !empty($data['confirm_password'])) {
                $errors[] = "As senhas devem ser iguais";
            }

            if(filter_var($data['email'], FILTER_VALIDATE_EMAIL) != true && !empty($data['email'])) {
                $errors[] = "Preencha um Email Válido";
            }
            
            return $errors;
        }
        
    }

?>
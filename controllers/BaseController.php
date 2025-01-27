<?php

namespace App;

use App\User_model;

class BaseController {

    public $userData;
    private $user_model;

    public function __construct () {
        $this->verify_session();
    }

    public function verify_session () {
        session_start();
        if(!isset($_SESSION['user'])) {
            header('Location: /workout-wise/authentication');
            exit;
        }

        $this->user_model = new User_model();
        $this->userData = $this->user_model->get($_SESSION['user']);
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

    protected function response ($data, $http_code, $msg = null) {
        
        header('Content-type: application/json');
        http_response_code($http_code);

        if(!empty($msg)) {
            $data['message'] = $msg;
        }
        
        die(json_encode($data));exit;
    }

    protected function validateHttpMethod(string $expectedMethod) {
        if ($_SERVER['REQUEST_METHOD'] !== strtoupper($expectedMethod)) {
            header('Location: /workout-wise/home');
            exit;
        }
    }
    
}

?>
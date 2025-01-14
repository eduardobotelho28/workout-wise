<?php

namespace App;

class BaseController {

    public function __construct () {
        $this->verify_session();
    }

    public function verify_session () {
        session_start();
        if(!isset($_SESSION['user'])) {
            header('Location: /workout-wise/authentication');
            exit;
        }
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

    protected function response ($data, $http_code, $msg) {
        header('Content-type: application/json');
        http_response_code($http_code);
        $data['message'] = $msg;
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
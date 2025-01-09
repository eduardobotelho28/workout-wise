<?php

$url_path  = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ; 
$url_parts = explode('/', $url_path);

$controller = $url_parts[1] ?? 'home'   ;
$method     = $url_parts[2] ?? 'index'  ; 
$params     = array_slice($url_parts, 3);

// find controller file.
$controller     = ucfirst($controller);
$controllerFile =  __DIR__ . "/controllers/{$controller}.php";

//verify if controller exists.
if(!file_exists($controllerFile)) {
    $controllerFile =  __DIR__ . "/controllers/Home.php";
}
    
require_once $controllerFile;

//verify if class and method exists in controller.
if (!class_exists($controller) || !method_exists($controller, $method)) {
    require_once __DIR__ . "/controllers/Home.php";
    $controller = 'Home';
    $method     = 'index';
    $params     = [];
} 

$controllerInstance = new $controller();
call_user_func_array([$controllerInstance, $method], $params);

?>
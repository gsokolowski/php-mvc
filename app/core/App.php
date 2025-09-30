<?php

namespace App\Core;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class App {

    private $controllerName = 'Home';
    private $methodName = 'index';

    private function splitUrl() {
        // Get the URL from the query string or default to home
        $url = $_GET['url'] ?? 'home';
        $url = explode('/', $url);
        return $url;
    }

    public function loadController() {

        $url = $this->splitUrl();

        $this->controllerName = ucfirst($url[0]);
        $controllerPath = '../app/controllers/' . $this->controllerName . '.php';
        
        if (file_exists($controllerPath)) {
        } else {
            $controllerPath = '../app/controllers/_404.php';
            $this->controllerName = '_404';
        }
        require_once $controllerPath;

        //show($this->controllerName); //Home Products _404

        $this->controllerName = '\\App\\Controllers\\' . $this->controllerName;
        $controller = new $this->controllerName(); //Home Products _404
        
        // calls controller and the method and an araay of parameters for controller method
        call_user_func_array([$controller, $this->methodName], []);
    }

}
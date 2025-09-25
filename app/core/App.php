<?php

namespace App\Core;

class App {

    private function splitUrl() {
        // Get the URL from the query string or default to home
        $url = $_GET['url'] ?? 'home';
        $url = explode('/', $url);
        return $url;
    }

    public function loadController() {
        $url = $this->splitUrl();

        $controllerFileName = '../app/controllers/' . ucfirst($url[0]) . '.php';
        if (file_exists($controllerFileName)) {
        } else {
            $controllerFileName = '../app/controllers/_404.php';
        }
        require_once $controllerFileName;
    }

}
<?php
session_start();

function show($url) {
    echo '<pre>';
    print_r($url);
    echo '</pre>';
}

function splitUrl() {
    // Get the URL from the query string or default to home
    $url = $_GET['url'] ?? 'home';
    $url = explode('/', $url);
    return $url;
}

//show(splitUrl());

function loadController() {
    $url = splitUrl();

    $controllerFileName = '../app/controllers/' . ucfirst($url[0]) . '.php';
    if (file_exists($controllerFileName)) {
    } else {
        $controllerFileName = '../app/controllers/_404.php';
    }
    require_once $controllerFileName;
}

loadController();
<?php

echo "hello world";

function show($url) {
    echo '<pre>';
    print_r($url);
    echo '</pre>';
}

/**
 * Split the URL into an array
 * @return array
 */
function splitUrl() {
    // Get the URL from the query string or default to home
    $url = $_GET['url'] ?? 'home';
    $url = explode('/', $url);
    return $url;
}

show(splitUrl());

// // Get the controller and method from the URL
// $controller = $url[0] ?? 'home';
// $method = $url[1] ?? 'index';

// // Get the parameters from the URL
// $params = array_slice($url, 2);

?>
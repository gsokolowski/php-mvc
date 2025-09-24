<?php

namespace App\Controllers;

class _404 {
    public function index() {
        echo "404 error - controller not found";
    }
}
$page404 = new _404();
$page404->index();

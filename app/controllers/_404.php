<?php

namespace App\Controllers;
use App\Core\Controller;

class _404 extends Controller
{
    
    public function index() {
        echo "404 error - controller not found";
    }
}
// call this class from App.php

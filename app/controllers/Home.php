<?php

namespace App\Controllers;
use App\Core\Controller;

class Home extends Controller
{
    
    public function index() {
        echo "home controller loaded and method index called --";
    }
}
// call this class from App.php

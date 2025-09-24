<?php

namespace App\Controllers;

class Home {
    
    public function index() {
        echo "home controller loaded and method index called";
    }
}

$home = new Home();
$home->index(); 

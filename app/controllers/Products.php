<?php

namespace App\Controllers;
use App\Core\Controller;

class Products extends Controller
{
    
    public function index() {
        echo "Products controller loaded and method index called --";
    }
}
// call this class from App.php
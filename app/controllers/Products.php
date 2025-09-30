<?php

namespace App\Controllers;
use App\Core\Controller;

class Products extends Controller
{
    
    public function index() {
        echo "Products controller loaded and method index called -- test";
        $this->view('products/products');
    }
}
// call this class from App.php
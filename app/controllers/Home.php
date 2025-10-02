<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Model;

class Home extends Controller
{
    
    public function index() {


        $model = new Model();
        $result = $model->test();
        show($result);

        echo "home controller loaded and method index called --";
        $this->view('Home');
    }
}
// call this class from App.php

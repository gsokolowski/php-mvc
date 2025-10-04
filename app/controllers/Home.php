<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Model;

class Home extends Controller
{
    
    public function index() {


        $model = new Model();
        $data['id'] = 1;
        $dataNot['name'] = 'Dominika';

        //$data['name'] = 'Dominika';

        $result = $model->where($data,$dataNot);
        echo 'show result';
        show($result);

        echo "home controller loaded and method index called --";
        $this->view('Home');
    }
}
// call this class from App.php

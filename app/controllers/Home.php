<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Model;

class Home extends Controller
{
    
    public function index() {


        $model = new Model();

        // testing where() model function
        // $data['id'] = 1;
        // $dataNot['name'] = 'Dominika';
        // $result = $model->where($data,$dataNot);
        // show($result);

        // testing insert() model function
        // $data['name'] = 'Sonia';
        // $data['age'] = '30';
        // $data['date'] = date('Y-m-d');
        // $result = $model->insert($data);
        // show($result);

        // testing update() model function
        $data['name'] = 'Mariane';
        $data['age'] = '53';
        $result = $model->update(3,$data);
        show($result);

        // testing delete
        // $result = $model->delete(5);
        // show($result);


        echo "home controller loaded and method index called --";
        $this->view('Home');
    }
}
// call this class from App.php

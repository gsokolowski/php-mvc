<?php

namespace App\Core;

class Model extends Database {

    public function test() {
        $this->connect();
        $this->query( "SELECT * FROM users", [] );
        $result = $this->fetchAll();
        return $result;
    }
}

// $model = new Model();
// $result = $model->test();
// show($result);
// die();

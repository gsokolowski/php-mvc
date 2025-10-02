<?php

namespace App\Core;

class Model {
    use Database; //trait Database is loaded

    public function test() {
        $result = $this->query( "SELECT * FROM users", [] );
        return $result;
    }


    
    // returns multiple rows
    public function where($data) {
        
    }
    // returns only one row
    public function first($data) {
        
    }
    // inserts data to db table
    public function insert($data) {
        
    }
    // updates record by id
    public function update($id, $data) {
        
    }
    // deltetes record by id
    public function delete($id) {
        
    }

}

// $model = new Model();
// $result = $model->test();
// show($result);
// die();

<?php

namespace App\Core;

class Model {

    use Database; //trait Database is loaded
    protected $table = 'users';
    protected $limit = 10;
    protected $offset = 0;

    public function test() {
        $sql = "SELECT * FROM users";
        $result = $this->query($sql , [] );
        return $result;
    }

    // returns multiple rows with where clause 
    public function where($data, $dataNot = []) {

        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);

        $sqlBuilder = "select * from $this->table where ";

        foreach ($keys as $key) {
            $sqlBuilder .= $key . " = :". $key . " && ";
        }

        foreach ($keysNot as $key) {
            $sqlBuilder .= $key . " != :". $key . " && ";
        }

        $sqlBuilder = trim($sqlBuilder, " &&");
        $sqlBuilder .= " limit $this->limit offset $this->offset";

        $data = array_merge($data, $dataNot);

        //$sql = "select * from users where id = :id && id != :id limit 10 offset 0";
        // show($sql);
        // show($data);
        // show($dataNot);

        return $this->query($sqlBuilder, $data);        
    }
    // returns only one row
    public function first($data, $dataNot = []) {

        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);

        $sqlBuilder = "select * from $this->table where ";

        foreach ($keys as $key) {
            $sqlBuilder .= $key . " = :". $key . " && ";
        }

        foreach ($keysNot as $key) {
            $sqlBuilder .= $key . " != :". $key . " && ";
        }

        $sqlBuilder = trim($sqlBuilder, " &&");
        $sqlBuilder .= " limit $this->limit offset $this->offset";

        $data = array_merge($data, $dataNot);

        //$sql = "select * from users where id = :id && id != :id limit 10 offset 0";
        // show($sql);
        // show($data);
        // show($dataNot);

        $result = $this->query($sqlBuilder, $data); 
        if($result) {
            return $result[0];
        }
        return false;
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

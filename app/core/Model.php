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

    private function buildSql($data, $dataNot) {

        //$sql = "select * from users where id = :id && id != :id limit 10 offset 0";

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

        return $sqlBuilder;
    }

    // returns multiple rows with where clause 
    public function where($data, $dataNot = []) {

        $sqlBuilder = $this->buildSql($data, $dataNot);

        // show($sql);
        // show($data);
        // show($dataNot);

        $data = array_merge($data, $dataNot);

        $result = $this->query($sqlBuilder, $data);
        if($result) {
            return $result;
        }
        return false;

    }
    // returns only one row
    public function first($data, $dataNot = []) {

        $sqlBuilder = $this->buildSql($data, $dataNot);

        $data = array_merge($data, $dataNot);

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

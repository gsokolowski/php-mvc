<?php

namespace App\Core;

class Model {

    use Database; //trait Database is loaded
    protected $table = 'users';
    protected $limit = 10;
    protected $offset = 0;

    public function test() {
        $sql = "SELECT * FROM users";
        $result = $this->executeQuery($sql , [] );
        return $result;
    }

    private function buildSql($data, $dataNot) {

        //$sql = "select * from users where id = :id && id != :id limit 10 offset 0";

        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);

        $sql = "select * from $this->table where ";

        foreach ($keys as $key) {
            $sql .= $key . " = :". $key . " && ";
        }

        foreach ($keysNot as $key) {
            $sql .= $key . " != :". $key . " && ";
        }

        $sql = trim($sql, " &&");
        $sql .= " limit $this->limit offset $this->offset";

        return $sql;
    }

    // returns multiple rows with where clause 
    public function where($data, $dataNot = []) {

        $sql = $this->buildSql($data, $dataNot);
        show($sql);
        $data = array_merge($data, $dataNot);
        $result = $this->executeQuery($sql, $data);

        if($result) {
            return $result;
        }
        return false;

    }
    // returns only one row
    public function first($data, $dataNot = []) {

        $sql = $this->buildSql($data, $dataNot);
        show($sql);
        $data = array_merge($data, $dataNot);

        $result = $this->executeQuery($sql, $data); 
        if($result) {
            return $result[0];
        }
        return false;
    }
    // inserts data to db table
    public function insert($data) {

        $keys = array_keys($data);
        echo implode(',:',$keys);
        $sql = "insert into $this->table (". implode(',',$keys) .") values (:". implode(',:',$keys) .") ";
        show($sql);

        $this->executeQuery($sql, $data); 
        $result = $this->lastInsertId();
        return $result;
        
    }
    // updates record by id
    public function update($id, $data) {

        $keys = array_keys($data);
        //$sql = "update $this->table set name =:name, age =:age where id = $id";
        $sql = "update $this->table set ";

        foreach ($keys as $key) {
            $sql .= $key . " = :". $key . " , ";
        }

        $sql = trim($sql, " ,");
        $sql .= " where id = :id";

        // echo $sql;
        $data['id'] = $id; // add id value into data
        // show($data);

        $this->executeQuery($sql, $data); 
        return false;
    }
    // deltetes record by id
    public function delete($id) {

        $data['id'] = $id;
        $sql = "delete from  $this->table where id = :id";
        
        $this->executeQuery($sql, $data); 
        return false;
    }
}

// $model = new Model();
// $result = $model->test();
// show($result);
// die();

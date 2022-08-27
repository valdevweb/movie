<?php

include_once "dbConfig.php";

class Crud
{

    private $conn;

    public function __construct()
    {
        $this->conn = getdbconnection();
        echo "<pre>";
        print_r($this->conn);
        echo '</pre>';
    }

    public function create($data_array, $table)
    {
        $columns = implode(',', array_keys($data_array));
        $place_holders = ':' . implode(',:', array_keys($data_array));
        $sql  = "INSERT INTO $table ($columns) VALUES ($place_holders)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data_array);
        return $this->conn->lastInsertId();
    }

    public function read($sql_query)
    {
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($sql_query)
    {
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
    }

    public function delete($sql_query)
    {
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
    }
}

<?php


// Creating class that store data in database
class Storage
{

    private $conn = null;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function storeResult($factor1, $factor2, $operation, $result)
    {

        // Data escaping
        $factor1 = $this->conn->real_escape_string($factor1);
        $factor2 = $this->conn->real_escape_string($factor2);
        $result = $this->conn->real_escape_string($result);
        $operation = $this->conn->real_escape_string($operation);

        // Data storing in database
        $sql = "INSERT INTO `calc` (`factor1`, `factor2`, `operation`, `result`, `operation_date`)
            VALUES ({$factor1}, {$factor2}, '{$operation}', {$result}, NOW())";

        $this->conn->query($sql);
    }
}

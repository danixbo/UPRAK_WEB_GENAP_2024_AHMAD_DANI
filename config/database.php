<?php

class database{
    public $database = 'UPRAK_AHMAD_DANI';
    public $host = 'localhost';
    public $user = 'root';
    public $pass = '';
    public $conn;

    public function koneksi(){
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function take($query) {
        $result = $this->conn->query($query);
        $data = [];
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function change($query) {
        $result = $this->conn->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>

<?php

class database{
    public $database = 'uprak_dani_baru';
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
    
    public function execute($query, $params = []) {
        $statement = $this->conn->prepare($query);
        if (!$statement) {
            die("Error in preparing statement: " . $this->conn->error);
        }
        
        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $statement->bind_param($types, ...$params);
        }
        
        if (!$statement->execute()) {
            die("Error in executing statement: " . $statement->error);
        }
        
        $statement->close();
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

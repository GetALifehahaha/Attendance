<?php

    class DbTest{
        
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }
        public function checkConnection($db){
            if ($this->conn){
                return json_encode(["status" => "success", "message" => "Connected to database successfully"]);
            } else {
                return json_encode(["status" => "error", "message" => "Failed to connect to database"]);
            }
        }
    }
?>
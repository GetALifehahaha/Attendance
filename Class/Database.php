<?php

    class Database{

        private $hostname = 'localhost';

        private $db_name = 'attendance_system_db';

        private $username = 'root';

        private $password = '';

        public $conn;

        public function getConnection(){
            $this->conn = null;

            try{
                $this->conn = new PDO("mysql:host=". $this->hostname. ";dbname=".$this->db_name, $this->username. $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e){
                die ("Failed to connect to database: ". $e->getMessage());
            }

            return $this->conn;
        }
    }
?>
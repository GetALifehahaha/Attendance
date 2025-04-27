<?php
  class Database{
    private $db_host = "localhost";
    private $db_name = "AttendED_DB";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){
      $this->conn = null;

      try{
        $this->conn = new PDO("mysql:host=$this->db_host; dbname=$this->db_name", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e){
        die("Connection error: " . $e->getMessage());
      }
      return $this->conn;
    }
  }

?>
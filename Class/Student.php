<?php

    class Student{

        private $student_ID;
        private $first_name;
        private $middle_name;
        private $last_name;
        public $conn;
        private $table = 'Students';

        public function __construct($db){
            $this->conn = $db;
        }

        public function createAccount($student_ID, $first_name, $middle_name, $last_name, $password){
            $hash_password = password_hash($password, PASSWORD_BCRYPT);
            $select = 'SELECT first_name FROM ' .$this->table. ' WHERE student_ID = ?;';
            $stmt = $this->conn->prepare($select);
            $stmt->execute([$student_ID]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$result){
                $query = 'INSERT INTO ' .$this->table. '(student_ID, first_name, middle_name, last_name, password) VALUES (?, ?, ?, ?, ?)';
                $stmt = $this->conn->prepare($query);
                return $stmt->execute([$student_ID, $first_name, $middle_name, $last_name, $hash_password]);
            } else {
                return json_encode(["status" => "success", "message" => "Account already existing"]);
            }
        }

        public function verify($student_ID, $password){
            $query = 'SELECT * FROM ' . $this->table . ' WHERE student_ID = ? LIMIT 1';
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$student_ID]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result){
                if (password_verify($password, $result['password'])){
                    return true;
                }

            return false;
            }
        }
    }
?>
<?php

    class Schedule{

        public $table = 'schedules';
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getAllSchedules(){
            $query = 'SELECT schedule_ID, schedule_department, schedule_year, schedule_section, schedule_name, schedule_start_time, schedule_end_time FROM '.$this->table.'  ORDER BY schedule_name';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getScheduleByID($schedule_ID){
            $query = 'SELECT schedule_ID, schedule_name, schedule_start_time, schedule_end_time, schedule_day_of_the_week, schedule_room, schedule_capacity FROM '.$this->table.' WHERE schedule_ID = ?';
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$schedule_ID]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function addSchedule($schedule_ID, $schedule_name, $schedule_department, $schedule_year, $schedule_section, $schedule_start_time, $schedule_end_time, $schedule_day_of_the_week, $schedule_room, $schedule_capacity){
            $check_q = 'SELECT schedule_ID FROM '.$this->table. ' WHERE schedule_ID = ?';
            $stmt = $this->conn->prepare($check_q);
            $stmt->execute([$schedule_ID]);

            if ($stmt->fetchAll(PDO::FETCH_ASSOC)){
                return false;
            }
            
            $query = 'INSERT INTO '.$this->table. ' VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$schedule_ID, $schedule_name, $schedule_department, $schedule_year, $schedule_section, $schedule_start_time, $schedule_end_time, $schedule_day_of_the_week, $schedule_room, $schedule_capacity]);

        }
    }
?>
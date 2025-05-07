<?php

    class Dashboard{

        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getCountStudents(){
            $query = 'SELECT COUNT(s.student_ID) student_count FROM students s';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getCountSchedules(){
            $query = 'SELECT COUNT(sc.schedule_ID) schedule_count FROM schedules sc';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public function getTopAbsences(){
            $query = 'SELECT CONCAT(s.first_name, " ", s.last_name) student_name, MAX(se.number_of_absences) number_of_absences FROM schedule_enrolled se JOIN students s ON se.student_ID = s.student_ID GROUP BY s.student_ID
                        ORDER BY se.number_of_absences DESC LIMIT 5';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getCurrentSchedules(){
            $query = 'SELECT schedule_name, CONCAT(schedule_department , " ", schedule_year , " ", schedule_section) section, schedule_start_time, schedule_end_time, schedule_room FROM schedules WHERE schedule_day_of_the_week = "Thursday"';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
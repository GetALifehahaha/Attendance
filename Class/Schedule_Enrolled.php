<?php
    
    class ScheduleEnrolled{
        public $table = 'schedule_enrolled';
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getAllStudentEnrolled($schedule_ID){
            $query = 'SELECT s.student_ID student_ID, CONCAT(s.last_name, ", ", s.first_name , " ", s.middle_name) student_name FROM '.$this->table. ' se
                        JOIN students s ON se.student_ID = s.student_ID
                        JOIN schedules sc ON se.schedule_ID = sc.schedule_ID
                        WHERE se.schedule_ID = ?
                        ORDER BY s.last_name';
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$schedule_ID]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllSchedule($student_ID){
            $query = 'SELECT sc.schedule_ID, sc.schedule_name, sc.schedule_start_time, sc.schedule_end_time, sc.schedule_day_of_the_week, sc.schedule_room, se.number_of_absences
                        FROM '.$this->table.' se
                        JOIN schedules sc ON se.schedule_ID = sc.schedule_ID
                        JOIN students s ON se.student_ID = s.student_ID
                        WHERE se.student_ID = ?
                        ORDER BY sc.schedule_start_time';
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$student_ID]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function enrollToSchedule($student_ID, $schedule_ID){
            $checkSched = 'SELECT * FROM schedules WHERE schedule_ID = ?';
            $stmt = $this->conn->prepare($checkSched);
            $stmt->execute([$schedule_ID]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$result){
                return false;
            }

            $checkq = 'SELECT student_ID, schedule_ID FROM '.$this->table.' 
                        WHERE student_ID = ? AND schedule_ID = ?';
            $stmt = $this->conn->prepare($checkq);
            $stmt->execute([$student_ID, $schedule_ID]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result){
                return false;
            }

            $query = 'INSERT INTO '.$this->table.' (student_ID, schedule_ID)
                        VALUES (?, ?)';
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$student_ID, $schedule_ID]);
        }

        public function deleteScheduleEnrolled($student_ID, $schedule_ID){
            $query = 'DELETE FROM '.$this->table. ' WHERE student_ID = ? AND schedule_ID = ?';
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$student_ID, $schedule_ID]);
        }
    }
?>
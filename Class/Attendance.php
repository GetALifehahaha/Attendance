<?php

    class Attendance{
        public $table = 'attendances';
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function setAttendance($schedule_ID) {
            $checkQ = 'SELECT end_time FROM '.$this->table.' WHERE end_time IS NOT NULL AND attendance_date = CURDATE() AND schedule_ID = ?';
            $stmt = $this->conn->prepare($checkQ);
            $stmt->execute([$schedule_ID]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result){
                return false;
            }

            $checkQ = 'SELECT * FROM '.$this->table.' WHERE attendance_date = CURDATE() AND schedule_ID = ?';
            $stmt = $this->conn->prepare($checkQ);
            $stmt->execute([$schedule_ID]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result){
                return true;
            }
            
            $query = '
                INSERT INTO '.$this->table.' (student_ID, schedule_ID, attendance_status, start_time, attendance_date)
                SELECT student_ID, schedule_ID, "absent", CURTIME(), CURDATE()
                FROM schedule_enrolled
                WHERE schedule_ID = ?';
            $stmt = $this->conn->prepare($query);

            return $stmt->execute([$schedule_ID]);
        }
        
        public function setPresent($student_ID, $schedule_ID) {
            // Get the latest attendance entry for this student today
            $checkQ = 'SELECT end_time FROM '.$this->table. ' WHERE end_time IS NOT NULL AND attendance_date = CURDATE() AND student_ID = ? AND schedule_ID = ?';
            $stmt = $this->conn->prepare($checkQ);
            $stmt->execute([$student_ID]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result){
                return false;
            }

            $query = '
                SELECT attendance_ID, TIMESTAMPDIFF(MINUTE, start_time, CURTIME()) AS diff
                FROM '.$this->table. '
                WHERE student_ID = ? AND attendance_date = CURDATE()    
                ORDER BY attendance_ID DESC LIMIT 1
            ';

            $stmt = $this->conn->prepare($query);
            $stmt->execute([$student_ID]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row = $result) {
                $diff = $row['diff'];
                
                $status = ($diff <= 15) ? 'present' : 'late';
                
                $query = 'UPDATE '.$this->table.' SET attendance_status = ? WHERE attendance_ID = ?';
                $stmt = $this->conn->prepare($query);
                return $stmt->execute([$status, $row['attendance_ID']]);
            }

            return false;
        }
        
        public function getAttendanceHistory($schedule_ID) {
            $query = 'SELECT s.student_ID student_ID, CONCAT(s.last_name, ", ", s.first_name , " ", s.middle_name) student_name, a.attendance_status, a.attendance_date FROM '.$this->table.' 
            a JOIN students s ON a.student_ID = s.student_ID 
            JOIN schedule_enrolled se ON se.schedule_ID = a.schedule_ID 
            WHERE se.schedule_ID = ?
            ORDER BY a.attendance_date DESC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute([$schedule_ID]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        public function endAttendance($schedule_ID) {
            $query = '
                UPDATE '.$this->table.'
                SET end_time = CURTIME()
                WHERE schedule_ID = ? AND attendance_date = CURDATE()
            ';
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$schedule_ID]);
        }
    }
?>
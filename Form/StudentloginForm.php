<?php
session_start();

include_once '../API/database.php';
$database = new Database();
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schoolId = htmlspecialchars($_POST['schoolId']);
    $password = htmlspecialchars($_POST['password']);

    echo "School-Id: " . $schoolId . "<br>";
    echo "Password: " . $password . "<br>";

    $sql = "SELECT * FROM students WHERE schoolId = :schoolId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':schoolId', $schoolId);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        echo "Student found in database.<br>"; // Debug
        // Check if the password matches
        if (password_verify($password, $student['password'])) {
            echo "Password verified.<br>";
            $_SESSION['student_id'] = $student['schoolId'];
            $_SESSION['role'] = 'student';
            $_SESSION['first_name'] = $student['firstName']; 
            header("Location: ../index/studentHomepage.php");
            exit;
        }
        else {
            echo "Password incorrect.<br>"; // Debug
            $_SESSION['login_error'] = "Invalid School ID or Password.";
            header("Location: ../index/studentLogin.php");
            exit;
        }
    } else {
        echo "Student not found.<br>"; // Debug
        $_SESSION['login_error'] = "Invalid School ID or Password.";
        header("Location: ../index/studentLogin.php");
        exit;
    }
} else {
    echo "Accessed directly.<br>"; // Debug
    header("Location: ../index/studentLogin.php");
    exit;
}
?>
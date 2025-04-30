<?php
session_start();

include_once '../API/database.php';
$database = new Database();
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    echo "Email: " . $email . "<br>"; // Debug: Show email
    echo "Password: " . $password . "<br>"; // Debug: Show password

    $sql = "SELECT * FROM teachers WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $teacher = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($teacher) {
        echo "Teacher found in database.<br>"; // Debug
        // Check if the password matches
        if (password_verify($password, $teacher['password'])) {
            echo "Password verified.<br>"; // Debug
            $_SESSION['teacher_id'] = $teacher['id'];
            $_SESSION['role'] = 'teacher';
            $_SESSION['first_name'] = $teacher['first_name'];
            header("Location: ../index/teacherDashboard.php");
            exit;
        } 
        else {
            echo "Password incorrect.<br>"; // Debug
            $_SESSION['login_error'] = "Invalid Email or Password.";
            header("Location: ../index/teacherLogin.php");
            exit;
        }
    } else {
        echo "Teacher not found.<br>"; // Debug
        $_SESSION['login_error'] = "Invalid Email or Password.";
        header("Location: ../index/teacherLogin.php");
        exit;
    }
} else {
    echo "Accessed directly.<br>"; // Debug
    header("Location: ../index/teacherLogin.php");
    exit;
}
?>
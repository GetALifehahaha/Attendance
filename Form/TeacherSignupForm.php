<?php
// Include the Database class
include_once '../API/database.php';

// Create a new Database instance
$database = new Database();
$conn = $database->getConnection();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize form data
    $email = htmlspecialchars($_POST['email']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $middleName = htmlspecialchars($_POST['middleName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password for storage
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query for teachers
    $sql = "INSERT INTO teachers (email, firstName, middleName, lastName, password)
            VALUES (:email, :firstName, :middleName, :lastName, :password)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':middleName', $middleName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':password', $hashedPassword);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "Teacher account created successfully!";
        header("Location: ../index/teacherLogin.php");
        exit;
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error: Could not insert teacher record. Details: " . $errorInfo[2];
    }
}
?>
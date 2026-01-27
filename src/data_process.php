<?php

session_start();

$host = getenv("DB_HOST");
$user = getenv("DB_USER");
$pass = getenv("DB_PASSWORD");
$db = getenv("DB_DATABASE");

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $stmt = $conn -> prepare('INSERT INTO admission (name, email, phone, message) VALUES (?, ?, ?, ?)');
    $stmt -> bind_param('ssss', $name, $email, $phone, $message);

    $stmt -> execute();

    if($stmt) {
        $_SESSION['applied'] = 'Application sent successfully';
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['applied'] = 'Application failed';
        header("Location: index.php");
        exit();
    }
}

?>
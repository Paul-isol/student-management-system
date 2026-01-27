<?php
// Enable error reporting for debugging
error_reporting(0);
session_start();

// get the details from .env file
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Failed to connect to the database: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $name, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row["usertype"] == "student") {
                $_SESSION['username'] = $name;
                $_SESSION['usertype'] = "student";
                header("Location: studenthome.php");
                exit();
            } else if ($row["usertype"] == "admin") {
                $_SESSION['username'] = $name;
                $_SESSION['usertype'] = "admin";
                header("Location: adminhome.php");
                exit();
            }
        } else {
            $message = "Invalid username or password";
            $_SESSION['loginmessage'] = $message;
            header("Location: login.php");
            exit();
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>
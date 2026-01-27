<?php
$db = getenv('DB_HOST');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

$conn = new mysqli($db, $user, $password, $database);

if ($conn->connect_error) {
    die("Failed to connect to the database: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM user WHERE id=$id";
$result = $conn->query($sql);

if ($result) {
    header("Location: viewstudent.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

?>
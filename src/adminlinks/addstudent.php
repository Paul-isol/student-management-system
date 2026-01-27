<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} elseif ($_SESSION['usertype'] != "admin") {
    header("Location: studenthome.php");
    exit();
}
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Failed to connect to the database: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $usertype = "student";
    $check = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($check);
    if ($result->num_rows > 0) {
        $_SESSION["user_added"] = "Student already exists";

    } else {
        $sql = "INSERT INTO user (username, email, phone, password, usertype) VALUES ('$name', '$email', '$phone', '$password', '$usertype')";
        $result = $conn->query($sql);
        if ($result) {
            $_SESSION["user_added"] = "Student added successfully";

        } else {
            $_SESSION["user_added"] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../dashboard.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Admin Sidebar -->
        <?php include 'admin_sidebar.php'; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Add Students</h2>
                </div>
            </nav>
            <!-- content -->
            <section class="admission-section py-5 bg-light-alt">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="admission-card p-4 p-md-5 bg-white rounded-4 border">
                                <div class="text-center mb-5">
                                    <h2 class="fw-bold display-6">Add Student details </h2>
                                    <div class="section-divider mx-auto"></div>
                                </div>
                                <?php
                                if (isset($_SESSION["user_added"])) {
                                    $alertClass = ($_SESSION['user_added'] == 'Student added successfully') ? 'alert-success' : 'alert-danger';
                                    echo "<div class='alert $alertClass'>" . $_SESSION["user_added"] . "</div>";
                                    unset($_SESSION["user_added"]);
                                }
                                ?>
                                <form method="POST">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Your Name" name="name">
                                                <label for="name">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="name@example.com" name="email">
                                                <label for="email">Email Address</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="phone"
                                                    placeholder="Phone Number" name="phone">
                                                <label for="phone">Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="password"
                                                    placeholder="Password" name="password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" name="submit"
                                                class="btn btn-primary btn-lg rounded-pill px-5 w-100 w-md-auto">Submit
                                                Application</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
} elseif ($_SESSION['usertype'] != "admin") {
    header("Location: ../studenthome.php");
    exit();
}
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$host = getenv('DB_HOST');
$db = getenv('DB_DATABASE');

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $dest = '../images/' . $name;
    if (!empty($image)) {
        move_uploaded_file($_FILES['image']['name'], $dest);
    }
    $sql = "INSERT INTO course (name, code, description, image) VALUES ('$name', '$code', '$description', '$dest')";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['course_added'] = 'Course added successfully';
    }else{
        $_SESSION['course_added'] = 'Failed to add course';
    }
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
        <?php
        include 'admin_sidebar.php';
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Admissions</h2>
                </div>
            </nav>
            <!-- content -->
            <div id="page-content-wrapper">

                <!-- content -->
                <section class="admission-section py-5 bg-light-alt">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="admission-card p-4 p-md-5 bg-white rounded-4 border">
                                    <div class="text-center mb-5">
                                        <h2 class="fw-bold display-6">Add Course details </h2>
                                        <div class="section-divider mx-auto"></div>
                                    </div>
                                    <?php
                                    if (isset($_SESSION["course_added"])) {
                                        $alertClass = ($_SESSION['course_added'] == 'Course added successfully') ? 'alert-success' : 'alert-danger';
                                        echo "<div class='alert $alertClass'>" . $_SESSION["course_added"] . "</div>";
                                        unset($_SESSION["course_added"]);
                                    }
                                    ?>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Your Name" name="name">
                                                    <label for="name">Course Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="code" name="code">
                                                    <label for="code">Course Code</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="description"
                                                        placeholder="Description" name="description">
                                                    <label for="description">Description</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text">Upload
                                                        image</label>
                                                    <input type="file" class="form-control" name="image">
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
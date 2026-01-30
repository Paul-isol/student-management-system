<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
} elseif ($_SESSION['usertype'] != "admin") {
    header("Location: ../studenthome.php");
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

$sql = "SELECT * FROM user WHERE usertype='student'";
$result = $conn->query($sql);

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
                    <h2 class="fs-2 m-0">Students Lists</h2>
                </div>
            </nav>
            <!-- content -->
            <div class="container p-4">
                <h1>Applied Students</h1>

                <div class="card shadow-sm border-0 rounded-4 my-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="ps-4 py-3 text-secondary text-uppercase small fw-bold">Name
                                    </th>
                                    <th scope="col" class="py-3 text-secondary text-uppercase small fw-bold">Email</th>
                                    <th scope="col" class="py-3 text-secondary text-uppercase small fw-bold">Phone</th>
                                    <th scope="col" class="py-3 text-secondary text-uppercase small fw-bold">Password
                                    </th>
                                    <th scope="col"
                                        class="py-3 text-center text-secondary text-uppercase small fw-bold">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='ps-4 fw-medium text-dark'>" . htmlspecialchars($row["username"]) . "</td>";
                                        echo "<td class='text-secondary'>" . htmlspecialchars($row["email"]) . "</td>";
                                        echo "<td class='text-secondary'>" . htmlspecialchars($row["phone"]) . "</td>";
                                        echo "<td class='text-secondary font-monospace'>" . htmlspecialchars($row["password"]) . "</td>";
                                        echo "<td class='text-center'>";
                                        echo "<a href='updatestudent.php?id=" . $row["id"] . "' class='btn btn-sm btn-outline-primary me-2 rounded-pill px-3'><i class='fas fa-edit me-1'></i> Update</a>";
                                        echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-sm btn-outline-danger rounded-pill px-3' onclick='return confirm(\"Are you sure you want to delete this student?\");'><i class='fas fa-trash-alt me-1'></i> Remove</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<td colspan='5' class='text-center py-5 text-muted'>No students found</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
<?php
error_reporting(0);
session_start();
$message = $_SESSION['loginmessage'] ?? '';
unset($_SESSION['loginmessage']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login - School Management App</title>
</head>

<body>
    <!-- Navbar (Consistent) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <span class="brand-text">W-School</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Admission</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary active" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section id="login-section" class="login-section py-5 d-flex align-items-center" style="min-height: 80vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-card p-4 p-sm-5 bg-white rounded-4 border">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold mb-1">Welcome Back</h2>
                            <p class="text-muted">Please sign in to your account</p>
                        </div>
                        <?php if ($message): ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <?php echo htmlspecialchars($message); ?>
                                </div>
                        <?php endif; ?>
                        <form action="login_process.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label text-muted small" for="remember">Remember me</label>
                                </div>
                                <a href="#" class="text-decoration-none small text-primary fw-medium">Forgot
                                    Password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-medium mb-4">Sign
                                In</button>

                            <div class="text-center">
                                <span class="text-muted small">Don't have an account? </span>
                                <a href="#" class="text-decoration-none small text-primary fw-bold">Sign Up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
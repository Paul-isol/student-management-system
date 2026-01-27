<?php
    error_reporting(0);
    session_start();
    session_destroy();
    if(isset($_SESSION['applied'])){
        $applied = $_SESSION['applied'];
        unset($_SESSION['applied']);
        echo '<script>alert("'.$applied.'");</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>School management App</title>
</head>

<body>
    <!-- Professional Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <span class="brand-text">W-School</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Landing "Hero" Section -->
    <section class="hero-section text-center text-lg-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="display-4 fw-bold mb-4">We Teach Our Students With Care</h1>
                    <p class="lead mb-4 text-muted">Providing a nurturing environment where education meets excellence.
                        Join us in shaping the future.</p>
                    <a href="#" class="btn btn-primary btn-lg rounded-pill px-4">Explore More</a>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <img src="./images/school.png" alt="School Building" class="img-fluid hero-img rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section: Playground -->
    <section class="feature-section py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-5">
                    <div class="img-wrapper">
                        <img src="./images/playground.jpg" alt="Playground"
                            class="img-fluid rounded-4 shadow-sm feature-img">
                    </div>
                </div>
                <div class="col-md-7">
                    <span class="badge bg-light text-primary mb-2">Facilities</span>
                    <h2 class="fw-bold mb-3">Modern Playground</h2>
                    <p class="text-muted mb-4">
                        Playground is a place where children can play and have fun. It is a safe and secure place where
                        children can play and have fun. We ensure every child's safety while they enjoy their
                        recreational time.
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-2">
                            <span class="text-success me-2">✔</span> Safe Equipment
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <span class="text-success me-2">✔</span> Large Open Spaces
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section class="teachers-section py-5 bg-light-alt">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-white text-primary shadow-sm px-3 py-2 rounded-pill mb-2">Expert Faculty</span>
                <h2 class="fw-bold display-6">Meet Our Teachers</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <div class="row g-4">
                <!-- Teacher 1 -->
                <div class="col-md-4">
                    <div class="teacher-card text-center p-4 bg-white rounded-4 shadow-sm h-100">
                        <div class="teacher-img-container mb-4 mx-auto">
                            <img src="./images/teacher1.png" alt="Teacher 1" class="img-fluid rounded-circle shadow-md">
                        </div>
                        <h4 class="fw-bold mb-1">Jane Cooper</h4>
                        <p class="text-primary fw-medium mb-3">Mathematics</p>
                        <p class="text-muted small">Passionate about making complex concepts simple and engaging for
                            every student.</p>
                    </div>
                </div>

                <!-- Teacher 2 -->
                <div class="col-md-4">
                    <div class="teacher-card text-center p-4 bg-white rounded-4 shadow-sm h-100">
                        <div class="teacher-img-container mb-4 mx-auto">
                            <img src="./images/teacher2.png" alt="Teacher 2" class="img-fluid rounded-circle shadow-md">
                        </div>
                        <h4 class="fw-bold mb-1">Cameron Williamson</h4>
                        <p class="text-primary fw-medium mb-3">Science</p>
                        <p class="text-muted small">Inspiring curiosity and scientific inquiry through hands-on
                            experiments.</p>
                    </div>
                </div>

                <!-- Teacher 3 -->
                <div class="col-md-4">
                    <div class="teacher-card text-center p-4 bg-white rounded-4 shadow-sm h-100">
                        <div class="teacher-img-container mb-4 mx-auto">
                            <img src="./images/teacher3.png" alt="Teacher 3" class="img-fluid rounded-circle shadow-md">
                        </div>
                        <h4 class="fw-bold mb-1">Eleanor Pena</h4>
                        <p class="text-primary fw-medium mb-3">English Literature</p>
                        <p class="text-muted small">Fostering a love for reading and creative expression in young minds.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-light text-primary shadow-sm px-3 py-2 rounded-pill mb-2">Our Capabilities</span>
                <h2 class="fw-bold display-6">Courses Offered</h2>
                <div class="section-divider mx-auto"></div>
                <p class="text-muted mt-3 w-75 mx-auto">Explore our wide range of professional courses designed to help
                    you build a successful career.</p>
            </div>

            <div class="row g-4">
                <!-- Course 1 -->
                <div class="col-md-4">
                    <div
                        class="course-card h-100 bg-white rounded-4 overflow-hidden border-0 shadow-sm position-relative">
                        <div class="course-img-wrapper position-relative">
                            <img src="./images/digital_marketing.png" alt="Digital Marketing" class="img-fluid w-100">
                            <div class="course-overlay d-flex align-items-center justify-content-center">
                                <a href="#" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm">View Details</a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4 class="fw-bold mb-2">Digital Marketing</h4>
                            <p class="text-muted small mb-3">Master SEO, Social Media, and Content Strategy to grow any
                                business online.</p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <span class="fw-bold text-primary">$199</span>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="col-md-4">
                    <div
                        class="course-card h-100 bg-white rounded-4 overflow-hidden border-0 shadow-sm position-relative">
                        <div class="course-img-wrapper position-relative">
                            <img src="./images/graphic_design.png" alt="Graphic Design" class="img-fluid w-100">
                            <div class="course-overlay d-flex align-items-center justify-content-center">
                                <a href="#" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm">View Details</a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4 class="fw-bold mb-2">Graphic Design</h4>
                            <p class="text-muted small mb-3">Learn Photoshop, Illustrator, and design principles to
                                create stunning visuals.</p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <span class="fw-bold text-primary">$149</span>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="col-md-4">
                    <div
                        class="course-card h-100 bg-white rounded-4 overflow-hidden border-0 shadow-sm position-relative">
                        <div class="course-img-wrapper position-relative">
                            <img src="./images/web_development.png" alt="Web Development" class="img-fluid w-100">
                            <div class="course-overlay d-flex align-items-center justify-content-center">
                                <a href="#" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm">View Details</a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h4 class="fw-bold mb-2">Web Development</h4>
                            <p class="text-muted small mb-3">Build modern, responsive websites using HTML, CSS,
                                JavaScript, and PHP.</p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <span class="fw-bold text-primary">$299</span>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Admission Form Section -->
    <section class="admission-section py-5 bg-light-alt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="admission-card p-4 p-md-5 bg-white rounded-4 border">
                        <div class="text-center mb-5">
                            <span class="badge bg-light text-primary mb-2">Join Us</span>
                            <h2 class="fw-bold display-6">Admission Form</h2>
                            <p class="text-muted">Fill out the form below to apply for admission.</p>
                            <div class="section-divider mx-auto"></div>
                        </div>

                        <form action="data_process.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
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
                                        <input type="number" class="form-control" id="phone" placeholder="Phone Number" name="phone">
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="textarea"
                                            style="height: 150px" name="message"></textarea>
                                        <label for="textarea">Message</label>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
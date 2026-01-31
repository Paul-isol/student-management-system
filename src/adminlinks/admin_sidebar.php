<div class="sidebar" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
        <i class="fas fa-user-secret me-2"></i>Admin
    </div>
    <div class="list-group list-group-flush my-3">
        <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
        <a href="../adminhome.php"
            class="list-group-item list-group-item-action bg-transparent second-text <?php echo ($currentPage == 'adminhome.php') ? 'active' : ''; ?>">
            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>
        <a href="admission.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php echo ($currentPage == 'admission.php') ? 'active' : ''; ?>">
            <i class="fas fa-project-diagram me-2"></i>Admissions
        </a>
        <a href="viewstudent.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php echo ($currentPage == 'viewstudent.php') ? 'active' : ''; ?>">
            <i class="fas fa-users me-2"></i>View Students
        </a>
        <a href="addstudent.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php echo ($currentPage == 'addstudent.php') ? 'active' : ''; ?>">
            <i class="fas fa-user-plus me-2"></i>Add Students
        </a>
        <a href="viewteacher.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php echo ($currentPage == 'viewteacher.php') ? 'active' : ''; ?>">
            <i class="fas fa-chalkboard-teacher me-2"></i>View Teachers
        </a>
        <a href="addteacher.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php echo ($currentPage == 'addteacher.php') ? 'active' : ''; ?>">
            <i class="fas fa-user-graduate me-2"></i>Add Teachers
        </a>
        <a href="viewcourses.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php echo ($currentPage == 'viewcourses.php') ? 'active' : ''; ?>">
            <i class="fas fa-book me-2"></i>View Courses
        </a>
        <a href="addcourses.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold <?php echo ($currentPage == 'addcourses.php') ? 'active' : ''; ?>">
            <i class="fas fa-plus-circle me-2"></i>Add Courses
        </a>
        <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger">
            <i class="fas fa-power-off me-2"></i>Logout
        </a>
    </div>
</div>
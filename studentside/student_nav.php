      
<!-- Navbar with admin_name displayed -->
<li class="nav-item dropdown pe-3">
<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?= htmlspecialchars($_SESSION['profile_image_url'] ?? 'assets/img/profile-img.jpg') ?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">
            <?= htmlspecialchars($_SESSION['last_name']) . ', ' . htmlspecialchars($_SESSION['first_name']) . ' ' . htmlspecialchars(substr($_SESSION['middle_name'], 0, 1)) . '.' ?>
        </span>
    </a><!-- End Profile Image Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
            <h6><?= htmlspecialchars($_SESSION['last_name']) . ', ' . htmlspecialchars($_SESSION['first_name']) . ' ' . htmlspecialchars(substr($_SESSION['middle_name'], 0, 1)) . '.' ?></h6>
            <span>Student</span>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="student-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="student-settings.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
            </a>
        </li>
    </ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->
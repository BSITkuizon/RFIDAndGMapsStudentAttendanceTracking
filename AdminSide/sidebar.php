<!-- ======= Sidebar ======= -->

<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed<?php if ($current_page == 'dashboard.php') echo 'active'; ?>" href="../admin/dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed <?php if (in_array($current_page, ['attendance.php', 'attendanceRecord.php'])) echo 'active'; ?>" data-bs-target="#attendace-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-calendar-check"></i><span>Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="attendace-nav" class="nav-content collapse <?php if (in_array($current_page, ['attendance.php', 'attendanceRecord.php'])) echo 'show'; ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="../admin/attendance.php" class="<?php if ($current_page == 'attendance.php') echo 'active'; ?>">
                        <i class="bi bi-circle"></i><span>Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/attendanceRecord.php" class="<?php if ($current_page == 'attendanceRecord.php') echo 'active'; ?>">
                        <i class="bi bi-circle"></i><span>Attendance Record</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed <?php if (in_array($current_page, ['studentRecord.php', 'addStudentRecord.php'])) echo 'active'; ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Student Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="forms-nav" class="nav-content collapse <?php if (in_array($current_page, ['studentRecord.php', 'addStudentRecord.php'])) echo 'show'; ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="../admin/studentRecord.php" class="<?php if ($current_page == 'studentRecord.php') echo 'active'; ?>">
                        <i class="bi bi-circle"></i><span>Student Record</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/addStudentRecord.php" class="<?php if ($current_page == 'addStudentRecord.php') echo 'active'; ?>">
                        <i class="bi bi-circle"></i><span>Register Student</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed <?php if ($current_page == 'classSchedule.php') echo 'active'; ?>" href="../admin/classSchedule.php">
                <i class="bi bi-grid"></i>
                <span>Class Schedule</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar-->

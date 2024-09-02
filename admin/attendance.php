<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: ../index.php'); // Redirect to login page if not an admin
    exit();
}

$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../NiceAdmin/assets/img/favicon.png" rel="icon">
    <link href="../NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../NiceAdmin/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        /* Profile Card Styles */
        .profile-card {
            padding: 20px;
            text-align: center;
        }

        .profile-form img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .profile-form h2 {
            font-size: 1.4em;
            color: #444;
            margin: 10px 0;
        }

        .profile-form h3 {
            font-size: 1.2em;
            color: #666;
            margin: 5px 0 20px;
        }

        /* Input Styles */
        .textbox {
            width: 100%;
            margin-top: 10px;
        }

        .textbox .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1em;
            color: #333;
        }

        .textbox .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <?php include "../logo.php"; ?><!-- End Logo -->

    

      

                <!-- navbar -->

                <?php include '../AdminSide/admin_nav.php'; ?>

                <!-- End Profile Nav -->

            <!-- End Icons Navigation -->

    </header><!-- End Header -->
    <!-- Sidebar -->
    <?php include '../AdminSide/sidebar.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Attendance <span id="currentDateTime"></span></h5>
                                    <?php
                                    // Check if there is a message in the session and display it
                                    if (isset($_SESSION['message'])) : ?>
                                        <div class="alert alert-<?= $_SESSION['msg_type'] ?> alert-dismissible fade show" role="alert">
                                            <i class="bi bi-check-circle me-1"></i>
                                            <?= $_SESSION['message']; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php
                                        // Unset the session variables after displaying the alert
                                        unset($_SESSION['message']);
                                        unset($_SESSION['msg_type']);
                                    endif;
                                    ?>


                                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                        <form id="attendanceForm" class="profile-form" method="POST" action="../adminprocess/process_attendance.php">
                                            <img src="../NiceAdmin/assets/img/profile-img.jpg" alt="Profile" id="profileImage">
                                            <h2 id="profileName">Unknown</h2>
                                            <h3 id="profileSection">N/A</h3>
                                            <div class="textbox">
                                                <input type="text" class="form-control" id="rfid" name="rfid" autofocus placeholder="Scan RFID" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Recent Attendance -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Recent Attendance <span>| Today</span></h5>

                                    <table class="table table-borderless datatable" id="attendanceTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Student ID</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be inserted here by JavaScript -->
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Attendance -->






                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <!-- <div class="col-lg-4">

                    Recent Attendance 
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                            <div class="activity" id="attendanceList">
                                Data will be inserted here by JavaScript 
                            </div>
                        </div>
                    </div>End Recent Attendance 
                    <script>
                        // Fetch attendance data
                        fetch('../adminprocess/fetch_attendance.php')
                            .then(response => response.json())
                            .then(data => {
                                const activityList = document.querySelector('#attendanceList');
                                activityList.innerHTML = '';

                                if (data.message) {
                                    // Display "NO CURRENT ATTENDANCE TAKEN TODAY" message if no attendance
                                    const noAttendanceMessage = document.createElement('div');
                                    noAttendanceMessage.className = 'activity-item d-flex justify-content-center text-muted';
                                    noAttendanceMessage.innerHTML = data.message;
                                    activityList.appendChild(noAttendanceMessage);
                                } else {
                                    data.forEach(record => {
                                        const activityItem = document.createElement('div');
                                        activityItem.className = 'activity-item d-flex';

                                        const currentTime = new Date();
                                        const recordTime = new Date(`${record.date}T${record.time}`);

                                        const timeDifferenceInMinutes = Math.floor((currentTime - recordTime) / (1000 * 60));

                                        let timeLabel = '';
                                        if (timeDifferenceInMinutes < 60) {
                                            timeLabel = `${timeDifferenceInMinutes} min`;
                                        } else if (timeDifferenceInMinutes < 1440) {
                                            timeLabel = `${Math.floor(timeDifferenceInMinutes / 60)} hrs`;
                                        } else {
                                            timeLabel = `${Math.floor(timeDifferenceInMinutes / 1440)} days`;
                                        }

                                        activityItem.innerHTML = `
                        <div class="activite-label">${timeLabel}</div>
                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <div class="activity-content">
                            <span class="fw-bold text-dark">${record.first_name} ${record.last_name} (ID: ${record.student_id_number})</span> marked attendance
                        </div>
                    `;
                                        activityList.appendChild(activityItem);
                                    });
                                }
                            })
                            .catch(error => console.error('Error fetching attendance data:', error));
                    </script>










                </div> -->
                <!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="../NiceAdmin/assets/vendor/quill/quill.js"></script>
    <script src="../NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../NiceAdmin/assets/js/main.js"></script>
    <script src="datetimejs/datetime.js"></script>
</body>

</html>
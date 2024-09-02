<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: ../index.php'); // Redirect to login page if not an admin
    exit();
}
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
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <?php include "../logo.php"; ?><!-- End Logo -->



        <?php include '../AdminSide/admin_nav.php'; ?>
        
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


                    <!-- Student Record-->
                    <div class="col-12">
                        <div class="card  overflow-auto">

                            <div class="card-body">

                                <h5 class="card-title">Student Record</span></h5>
                                <div class="row">
                                    <div class="col-4">
                                        <button type="button" class="btn btn-primary"><i class="bi bi-plus me-1"></i> Add Student</button>
                                    </div>

                                    <table class="table table-border table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th>Profile</th>
                                                <th scope="col">RFID</th>
                                                <th scope="col">Student ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Grade</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../conn.php';

                                            // SQL query to fetch student data
                                            $sql = "SELECT student_id_number, first_name, middle_name, last_name, email, section, rfid_number FROM students";
                                            $result = $conn->query($sql);

                                            // Check for query execution success
                                            if ($result === false) {
                                                echo "Error: " . $conn->error;
                                                exit;
                                            }

                                            if ($result->num_rows > 0) {
                                                $counter = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    $full_name = $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"];
                                                    echo "<tr>
                                                    <th scope='row'>$counter</th>
                                                    <td><img src='' alt='STUDENT PICTURE'></td>
                                                    <td>" . htmlspecialchars($row["rfid_number"]) . "</td>
                                                    <td><a href='#'>" . htmlspecialchars($row["student_id_number"]) . "</a></td>
                                                    <td>" . htmlspecialchars($full_name) . "</td>

                                                    <td><span>
                                                        <button type='button' class='btn btn-info'><i class='bi bi-info-circle'></i></button>
                                                        <button type='button' class='btn btn-danger'><i class='bi bi-exclamation-octagon'></i></button>
                                                    </span></td>
                                                </tr>";
                                                    $counter++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='8'>No records found</td></tr>";
                                            }
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>

                                    <!-- Right/End Aligned Pagination -->
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav><!-- End Right/End Aligned Pagination -->
                                </div>
                            </div>
                        </div><!-- End Student Record -->

                    </div>
                </div><!-- End Left side columns -->



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
    <script src="../NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="../NiceAdmin/assets/vendor/quill/quill.js"></script>
    <script src="../NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../NiceAdmin/assets/js/main.js"></script>

</body>

</html>
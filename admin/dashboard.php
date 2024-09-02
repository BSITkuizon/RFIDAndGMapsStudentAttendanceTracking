<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
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
          <div class="row">
            <?php
            include '../conn.php';

            // Initialize counts
            $total_students = 0;
            $total_sections = 0;
            $total_subjects = 0;

            // Count total students
            $sql_students = "SELECT COUNT(*) AS total FROM students";
            if ($result_students = $conn->query($sql_students)) {
              $row_students = $result_students->fetch_assoc();
              $total_students = $row_students['total'];
            }

            // Count total sections
            $sql_sections = "SELECT COUNT(*) AS total FROM section";
            if ($result_sections = $conn->query($sql_sections)) {
              $row_sections = $result_sections->fetch_assoc();
              $total_sections = $row_sections['total'];
            }

            // Count total subjects
            $sql_subjects = "SELECT COUNT(*) AS total FROM classsubject";
            if ($result_subjects = $conn->query($sql_subjects)) {
              $row_subjects = $result_subjects->fetch_assoc();
              $total_subjects = $row_subjects['total'];
            }

            $conn->close();
            ?>

            <!-- Students Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
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
                  <h5 class="card-title">Total Students</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo htmlspecialchars($total_students); ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Students Card -->

            <!-- Sections Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
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
                  <h5 class="card-title">Total Sections</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-grid"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo htmlspecialchars($total_sections); ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sections Card -->

            <!-- Subjects Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
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
                  <h5 class="card-title">Total Subjects</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo htmlspecialchars($total_subjects); ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Subjects Card -->

            <?php
            // Fetch attendance data from the database
            include '../conn.php';

            // Initialize arrays
            $present_data = [];
            $absent_data = [];
            $excused_data = [];
            $date_labels = [];

            // Example: Fetch attendance counts per day for the past week
            $sql = "SELECT DATE(attendance_date_taken) AS date, 
               SUM(CASE WHEN status = 'present' THEN 1 ELSE 0 END) AS present_count,
               SUM(CASE WHEN status = 'absent' THEN 1 ELSE 0 END) AS absent_count,
               SUM(CASE WHEN status = 'excuse' THEN 1 ELSE 0 END) AS excused_count
        FROM attendance
        WHERE attendance_date_taken BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()
        GROUP BY DATE(attendance_date_taken)
        ORDER BY DATE(attendance_date_taken)";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $date_labels[] = '"' . $row['date'] . '"';
                $present_data[] = $row['present_count'];
                $absent_data[] = $row['absent_count'];
                $excused_data[] = $row['excused_count'];
              }
            }

            $conn->close();
            ?>

            <!-- Reports -->
            <div class="col-12">
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
                  <h5 class="card-title">Attendance Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Present',
                          data: [<?php echo implode(',', $present_data); ?>],
                        }, {
                          name: 'Absent',
                          data: [<?php echo implode(',', $absent_data); ?>]
                        }, {
                          name: 'Excused',
                          data: [<?php echo implode(',', $excused_data); ?>]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: [<?php echo implode(',', $date_labels); ?>]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>
              </div>
            </div><!-- End Reports -->




          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-0">





        </div><!-- End Right side columns -->

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
<?php
session_start(); // Start the session



// Check if the user is logged in as student
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'student') {
  header('Location: ../index.php'); // Redirect to login page if not an student
  exit();
}

include "../conn.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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

  <style>
    /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        } */

    /* .calendar-container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        } */

    h1 {
      text-align: center;
      color: #333;
    }

    .month-select {
      margin-bottom: 20px;
      text-align: center;
    }

    .calendar {
      width: 100%;
      border-collapse: collapse;
    }

    .calendar th,
    .calendar td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      position: relative;
    }

    .calendar th {
      background-color: #f2f2f2;
    }

    .calendar td {
      background-color: #fff;
      cursor: pointer;
    }

    .calendar td:hover {
      background-color: #f9f9f9;
    }

    .day {
      display: block;
      font-size: 1.2em;
      margin-bottom: 5px;
    }

    .day-name {
      font-size: 0.8em;
      color: #888;
    }

    .status {
      display: block;
      width: 20px;
      height: 20px;
      margin: 0 auto;
      border-radius: 50%;
      background-color: #fff;
    }

    .present {
      background-color: #4CAF50;
      /* Green for present */
    }

    .absent {
      background-color: #F44336;
      /* Red for absent */
    }

    .excused {
      background-color: #BDBDBD;
      /* Gray for excused */
    }

    .not-taken {
      background-color: #000000;
      /* Black for not yet taken */
    }

    .holiday {
      background-color: #2196F3;
      /* Blue for holidays */
    }
    .table-responsive {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 8px;
  text-align: center;
  vertical-align: middle; /* Center content vertically */
}

.table thead th {
  background-color: #f4f4f4;
  font-weight: bold;
}

.circle {
  width: 40px; /* Adjust size as needed */
  height: 40px; /* Adjust size as needed */
  background-color: #007bff; /* Adjust color as needed */
  border-radius: 50%; /* Make it a circle */
  margin: 0 auto; /* Center horizontally */
}

/* Extra Small Devices (Phones) */
@media (max-width: 480px) {
  .table th,
  .table td {
    display: block;
    width: 100%;
    box-sizing: border-box;
  }

  .table thead {
    display: none; /* Hide headers on small screens */
  }

  .table tbody tr {
    margin-bottom: 10px;
    border: 1px solid #ddd;
    display: block;
    border-radius: 4px;
  }

  .table tbody td {
    display: flex;
    justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
    padding: 10px;
    position: relative;
    text-align: center;
  }

  .table tbody td::before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%;
    padding: 0 10px;
    font-weight: bold;
    text-align: left;
    background: #f4f4f4;
    border-right: 1px solid #ddd;
  }
}

/* Small Devices (Phones) */
@media (min-width: 481px) and (max-width: 767px) {
  .table th,
  .table td {
    display: block;
    width: 100%;
    box-sizing: border-box;
  }

  .table thead {
    display: none; /* Hide headers on smaller phones */
  }

  .table tbody tr {
    margin-bottom: 10px;
    border: 1px solid #ddd;
    display: block;
    border-radius: 4px;
  }

  .table tbody td {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    position: relative;
    text-align: center;
  }

  .table tbody td::before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%;
    padding: 0 10px;
    font-weight: bold;
    text-align: left;
    background: #f4f4f4;
    border-right: 1px solid #ddd;
  }
}

/* Medium Devices (Tablets) */
@media (min-width: 768px) and (max-width: 1024px) {
  .table th,
  .table td {
    padding: 10px;
    text-align: center;
  }
}

/* Large Devices (Tablets and Small Laptops) */
@media (min-width: 1025px) {
  .table th,
  .table td {
    padding: 12px;
    text-align: center;
  }
}

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <?php include "../logo.php"; ?>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <!-- Navbar -->

        <?php include '../studentside/student_nav.php'; ?>
        <!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <!-- Sidebar -->
  <?php include '../studentside/student_sidebar.php'; ?>

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

    <div class="card">
      <div class="card-body">
        <div class="calendar-container">
          <h1>Attendance Calendar</h1>
          <div class="month-select">
            <div class="col-md-4 justify-content-center mx-auto">
              <label for="month">Select Month:</label>
              <select id="month" onchange="filterMonth()" class="form-select" aria-label="Default select example">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
            </div>
          </div>
          <div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Sun</th>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
      </tr>
    </thead>
    <tbody id="calendar-body">
      <tr>
        <td><div class="circle"></div></td>
        <td><div class="circle"></div></td>
        <td><div class="circle"></div></td>
        <td><div class="circle"></div></td>
        <td><div class="circle"></div></td>
        <td><div class="circle"></div></td>
        <td><div class="circle"></div></td>
      </tr>
      <!-- More rows as needed -->
    </tbody>
  </table>
</div>


        </div>

        <script>
          const philippineHolidays = [
            '2024-01-01', // New Year's Day
            '2024-04-09', // Araw ng Kagitingan
            '2024-04-10', // Maundy Thursday
            '2024-04-11', // Good Friday
            '2024-05-01', // Labor Day
            '2024-06-12', // Independence Day
            '2024-08-26', // National Heroes Day
            '2024-11-30', // Bonifacio Day
            '2024-12-25', // Christmas Day
            '2024-12-30', // Rizal Day
          ];

          const attendanceData = {
            1: [ // January
              [0, 3, 1, 1, 0, 1, 1],
              [1, 1, 3, 1, 1, 0, 1],
              [1, 1, 1, 0, 3, 1, 0],
              [0, 1, 1, 0, 1, 3, 1],
              [1, 1, 1, 1, 0, 0, 1]
            ],
            2: [ // February
              [0, 1, 1, 3, 1, 0, 1],
              [1, 1, 0, 1, 1, 0, 1],
              [1, 0, 1, 1, 1, 3, 0],
              [0, 1, 1, 0, 1, 0, 1],
              [1, 0, 1, 1, 1, 1, 0]
            ],
            // Continue for other months...
          };

          function createCalendar(month) {
            const daysInMonth = new Date(2024, month, 0).getDate();
            const startDay = new Date(2024, month - 1, 1).getDay();
            let calendarHtml = '';
            let rowHtml = '';

            const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            // Add empty cells for the first row if the month does not start on Sunday
            for (let i = 0; i < startDay; i++) {
              rowHtml += '<td></td>';
            }

            for (let day = 1; day <= daysInMonth; day++) {
              const weekDay = new Date(2024, month - 1, day).getDay();
              const dateStr = `2024-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
              const isHoliday = philippineHolidays.includes(dateStr);
              const weekIndex = Math.floor((day - 1) / 7);
              const dayIndex = (day - 1) % 7;

              let statusClass = 'not-taken';
              if (isHoliday) {
                statusClass = 'holiday';
              } else if (weekDay !== 0 && weekDay !== 6) {
                const status = attendanceData[month]?.[weekIndex]?.[dayIndex];
                if (status === 1) statusClass = 'present';
                else if (status === 0) statusClass = 'absent';
                else if (status === 3) statusClass = 'excused';
              }

              rowHtml += `<td>
                                <span class="day">${day}</span>
                                <span class="day-name">${dayNames[weekDay]}</span>
                                <span class="status ${statusClass}"></span>
                            </td>`;

              // End of the week (Saturday), start a new row
              if (weekDay === 6) {
                calendarHtml += `<tr>${rowHtml}</tr>`;
                rowHtml = '';
              }
            }

            // Fill remaining cells with empty cells if the last row is not full
            if (rowHtml) {
              while (rowHtml.split('</td>').length - 1 < 7) {
                rowHtml += '<td></td>';
              }
              calendarHtml += `<tr>${rowHtml}</tr>`;
            }

            return calendarHtml;
          }

          function filterMonth() {
            const month = parseInt(document.getElementById('month').value, 10);
            document.getElementById('calendar-body').innerHTML = createCalendar(month);
          }

          // Initialize calendar for the first month
          filterMonth();
        </script>
      </div>
    </div>

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
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-student-bootstrap-student-html-template/ -->
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
<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: ../index.php'); // Redirect to login page if not an admin
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../NiceAdmin/assets/css/style.css" rel="stylesheet">

    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            const message = urlParams.get('message');
            if (status === 'success') {
                alert('New record created successfully');
            } else if (status === 'error') {
                alert('There was an error creating the record: ' + decodeURIComponent(message));
            } else if (status === 'duplicate') {
                alert('Duplicate record found. Please check the entered details.');
            }

            // Add event listener to gender select to change profile image
            const genderSelect = document.getElementById('inputGender');
            const profileImage = document.getElementById('selectedAvatar');
            genderSelect.addEventListener('change', function() {
                if (genderSelect.value === 'Male') {
                    profileImage.src = '../DefaultProfile/MaleDefaultProfile.png';
                } else if (genderSelect.value === 'Female') {
                    profileImage.src = '../DefaultProfile/FemaleDefaultProfile.png';
                } else {
                    profileImage.src = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg';
                }
            });
        };
    </script>

    <style>
        .table img {
            width: 50px;
            /* Adjust the width as needed */
            height: 50px;
            /* Adjust the height as needed */
            object-fit: cover;
            /* Ensure the image covers the box without stretching */
            border-radius: 50%;
            /* Optional: Make the image circular */
            display: block;
            margin: auto;
            /* Center the image */
        }
    </style>
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

            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">

                    <!-- Student Record-->
                    <?php
                    // Include the database connection file
                    include '../conn.php';

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch section data from the database
                    $sectionQuery = "SELECT * FROM section";
                    $sectionResult = $conn->query($sectionQuery);

                    // Check if query execution was successful
                    if ($sectionResult === false) {
                        die("Error: Could not execute query for sections. " . $conn->error);
                    }
                    ?>
                    <div class="col-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                            <i class="bi bi-plus me-1"></i> Add Student</button>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#disablebackdrop ">
                            <i class="bi bi-file-earmark-spreadsheet me-1"></i> Add Student
                        </button>

                    </div>
                    <!-- Bordered Tabs Justified -->
                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                        <?php
                        $firstSection = true; // Flag to identify the first section

                        if ($sectionResult->num_rows > 0) {
                            while ($section = $sectionResult->fetch_assoc()) {
                                $tabId = "bordered-justified-section" . $section['section_id'];
                                $tabLabel = htmlspecialchars($section['section_name']);
                                $isActive = $firstSection ? ' active' : ''; // Set the first tab as active
                                echo "<li class='nav-item flex-fill' role='presentation'>
                                <button class='nav-link w-100$isActive' id='{$tabId}-tab' data-bs-toggle='tab' data-bs-target='#{$tabId}' type='button' role='tab' aria-controls='{$tabId}' aria-selected='true'>{$tabLabel}</button>
                            </li>";
                                $firstSection = false;
                            }
                        } else {
                            echo "<li class='nav-item flex-fill' role='presentation'>
                                <button class='nav-link w-100 active' type='button' role='tab' aria-controls='no-data' aria-selected='true'>No Sections</button>
                            </li>";
                        }
                        ?>
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                        <?php
                        // Reset flag for tab content
                        $firstSection = true;

                        // Re-fetch section data for tab content
                        $sectionResult->data_seek(0); // Reset result pointer to the start

                        if ($sectionResult->num_rows > 0) {
                            while ($section = $sectionResult->fetch_assoc()) {
                                $sectionId = $section['section_id'];
                                $tabId = "bordered-justified-section" . $sectionId;
                                $isActive = $firstSection ? ' show active' : ''; // Set the first tab content as active
                                echo "<div class='tab-pane fade$isActive' id='{$tabId}' role='tabpanel' aria-labelledby='{$tabId}-tab'>";

                                // Display the new table for the current section
                                echo "<table class='table table-border table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th>Profile</th>
                            <th scope='col'>RFID</th>
                            <th scope='col'>Student ID</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Birthday</th>
                            <th scope='col'>Section</th>
                            <th scope='col'>Actions</th>
                        </tr>
                    </thead>
                    <tbody>";

                                // Modify the SQL query to join the students table with the section table using section_id
                                $sql = "SELECT students.profile_image_url, students.first_name, students.middle_name, students.last_name, students.student_id_number, students.rfid_number, students.date_of_birth, section.section_name 
                    FROM students 
                    INNER JOIN section ON students.section_id = section.section_id 
                    WHERE students.section_id = {$sectionId} 
                    ORDER BY students.last_name ASC";

                                $result = $conn->query($sql);

                                // Check if query execution was successful
                                if ($result === false) {
                                    echo "<tr><td colspan='8'>Error: Could not execute query for students. " . $conn->error . "</td></tr>";
                                } else {
                                    $count = 1;



                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<th scope='row'>" . $count . "</th>";
                                            echo "<td><img src='" . htmlspecialchars($row["profile_image_url"]) . "' alt='STUDENT PICTURE' style='width: 50px; height: 50px;'></td>";
                                            echo "<td>" . htmlspecialchars($row["rfid_number"]) . "</td>";
                                            echo "<td><a href='#'>" . htmlspecialchars($row["student_id_number"]) . "</a></td>";
                                            echo "<td>" . htmlspecialchars($row["last_name"]) . ", " . htmlspecialchars($row["first_name"]) . " " . htmlspecialchars($row["middle_name"]) . "</td>";
                                            echo "<td>" . htmlspecialchars($row["date_of_birth"]) . "</td>";
                                            echo "<td>" . htmlspecialchars($row["section_name"]) . "</td>";
                                            echo "<td>
                                                <button type='button' class='btn btn-info rounded-pill'>Edit</button>
                                                <button type='button' class='btn btn-danger rounded-pill' data-bs-toggle='modal' data-bs-target='#deleteModal' data-id='" . htmlspecialchars($row["rfid_number"]) . "'>Delete</button>
                                                </td>";
                                            echo "</tr>";
                                            $count++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No data found for this Section</td></tr>";
                                    }
                                }

                                echo "</tbody></table>";
                                echo "</div>";

                                $firstSection = false; // Move to the next section
                            }
                        } else {
                            echo "<div class='tab-pane fade show active' id='no-data' role='tabpanel' aria-labelledby='no-data-tab'>
                            <table class='table table-border table-hover'>
                            <thead>
                                <tr>
                                    <th scope='col'>#</th>
                                    <th>Profile</th>
                                    <th scope='col'>RFID</th>
                                    <th scope='col'>Student ID</th>
                                    <th scope='col'>Name</th>
                                    <th scope='col'>Birthday</th>
                                    <th scope='col'>Section</th>
                                    <th scope='col'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td colspan='8'>No sections available.</td></tr>
                            </tbody>
                            </table>
                        </div>";
                        }

                        $conn->close();
                        ?>
                    </div><!-- End Bordered Tabs Justified -->

                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="deleteForm" method="post" action="../adminprocess/delete_student.php">
                                    <div class="modal-body">
                                        <input type="hidden" id="delete-id" name="rfid_number">
                                        <p>Are you sure you want to delete this student?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var deleteModal = document.getElementById('deleteModal');

                            deleteModal.addEventListener('show.bs.modal', function(event) {
                                var button = event.relatedTarget; // Button that triggered the modal
                                var rfidNumber = button.getAttribute('data-id'); // Extract info from data-* attributes

                                var modalBodyInput = deleteModal.querySelector('#delete-id');
                                modalBodyInput.value = rfidNumber; // Update the modal's hidden input
                            });
                        });
                    </script>












                </div><!-- End Left side columns -->














                <!-- Student Personal Record Form -->
                <div class="modal fade" id="largeModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Student Personal Record</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Student Information Form</h5>

                                        <!-- Student Information Form -->
                                        <form class="row g-3" id="studentForm" method="POST" action="../adminprocess/addstudent.php" enctype="multipart/form-data">

                                            <div class="col-md-4">
                                                <label for="inputFirstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="John" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputMiddleName" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="inputMiddleName" name="middle_name" placeholder="Middle">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputLastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Doe" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputEmail" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="john.doe@example.com" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputStudentIdNumber" class="form-label">Student ID Number</label>
                                                <input type="text" class="form-control" id="inputStudentIdNumber" name="student_id_number" placeholder="11-1111" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputDOB" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="inputDOB" name="date_of_birth" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputGender" class="form-label">Gender</label>
                                                <select id="inputGender" class="form-select" name="gender" required>
                                                    <option selected>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Non-Binary">Non-Binary</option>
                                                    <option value="Prefer not to say">Prefer not to say</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="inputAddress" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="434 Main St" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="section_id" class="form-label">Section</label>
                                                <select class="form-select" id="section_id" name="section_id" required>
                                                    <option value="" disabled selected>Select Section</option>
                                                    <?php
                                                    include "../conn.php";
                                                    // Create connection
                                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }

                                                    $sql = "SELECT section_id, section_name FROM section";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['section_id'] . "'>" . $row['section_name'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value='' disabled>No sections available</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="rfid_number" class="form-label">RFID Number</label>
                                                <input type="text" class="form-control" id="rfid_number" name="rfid_number" placeholder="0001234" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Add Student</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div><!-- End Student Personal Record Modal -->
                        </div>
                    </div>
                </div>






                <!-- excel upload modal-->
                <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title ">Add Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../adminprocess/addstudentexcel.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <label class="form-label" for="customFile">Upload only .xlsx</label>
                                    <input type="file" class="form-control" id="customFile" name="excel" accept=".xls,.xlsx" required />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="import">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End Disabled Backdrop Modal-->


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
    <script>
        function displaySelectedImage(event, elementId) {
            const selectedImage = document.getElementById(elementId);
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
    <script>
        <?php
        session_start();
        if (isset($_SESSION['success'])) {
            echo "Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '" . $_SESSION['success'] . "',
            });";
            unset($_SESSION['success']); // Clear the success message
        }
        ?>
    </script>

</body>

</html>
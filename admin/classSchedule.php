<?php
session_start(); // Start the session

$current_page = basename($_SERVER['PHP_SELF']);

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

  <!-- Template Main CSS File -->
  <link href="../NiceAdmin/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <?php include "../logo.php"; ?><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

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

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Subject</h5>
              <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Subject</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Time Schedule</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered"> <i class="bi bi-plus"></i>Add Subject</button>
                  <!-- Button to trigger the Add Section Modal -->
                  <button type="button" class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#addSectionModal"><i class="bi bi-plus"></i> Add Section</button>

                  <br>
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

                  <!-- Start Add Subject Modal -->
                  <div class="modal fade" id="verticalycentered" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="addSubjectModalLabel">Add Subject</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- SUBJECT FORM -->
                          <form id="addSubjectForm" class="row g-3" method="POST" action="../adminprocess/addSubject.php">
                            <div class="col-md-6">
                              <label for="subjectName" class="form-label">Subject Name</label>
                              <input type="text" class="form-control" id="subjectName" name="subjectName" required>
                            </div>
                            <div class="col-md-6">
                              <label for="subjectCode" class="form-label">Subject Code</label>
                              <input type="text" class="form-control" id="subjectCode" name="subjectCode" required>
                            </div>

                            <div class="mb-3">
                              <label for="teacher" class="form-label">Teacher</label>
                              <input type="text" class="form-control" id="teacher" name="teacher">
                            </div>
                            <div class="mb-3">
                              <label for="section" class="form-label">Section</label>
                              <select class="form-select" id="section" name="section" required>
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
                            <div class="mb-3">
                              <label class="form-label">Meeting Days</label>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="monday" name="meetingDays[]" value="Mon">
                                    <label class="form-check-label" for="monday">Monday</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tuesday" name="meetingDays[]" value="Tues">
                                    <label class="form-check-label" for="tuesday">Tuesday</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wednesday" name="meetingDays[]" value="Wed">
                                    <label class="form-check-label" for="wednesday">Wednesday</label>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="thursday" name="meetingDays[]" value="Thurs">
                                    <label class="form-check-label" for="thursday">Thursday</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="friday" name="meetingDays[]" value="Fri">
                                    <label class="form-check-label" for="friday">Friday</label>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="mb-3">
                              <label for="semester" class="form-label">Semester</label>
                              <select class="form-select" id="semester" name="semester" required>
                                <option value="" disabled selected>Select Semester</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="schoolYear" class="form-label">School Year</label>
                              <input type="text" class="form-control" id="schoolYear" name="schoolYear" required placeholder="e.g., 2024-2025">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="addSubject" name="addSubject">Add Subject</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Add Subject Modal -->
                  <!-- Start Add Section Modal -->
                  <div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="addSectionModalLabel">Add Section</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Add Section Form -->
                          <form id="addSectionForm" class="row g-3" method="POST" action="../adminprocess/createSection.php">
                            <div class="col-md-12">
                              <label for="sectionName" class="form-label">Section Name</label>
                              <input type="text" class="form-control" id="sectionName" name="sectionName" required>
                            </div>

                            <div class="col-md-12">
                              <label for="adviser" class="form-label">Adviser</label>
                              <input type="text" class="form-control" id="adviser" name="adviser" required>
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="addSection" name="addSection">Add Section</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Add Section Modal -->




                  <!-- Table with stripped rows -->
                  <!-- Table with Edit and Delete Buttons -->
                  <!-- Vertical Pills Tabs -->




                  <!-- Bordered Tabs Justified -->
                  <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                    <?php
                    // Fetch section data from the database
                    $sectionQuery = "SELECT * FROM section";
                    $sectionResult = $conn->query($sectionQuery);
                    $activeTab = 'bordered-justified-home'; // Default active tab ID
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

                        // Display the table for the current section
                        echo "<table class='table table-striped'>
                          <thead>
                            <tr>
                              <th scope='col'>#</th>
                              <th scope='col'>Subject Name</th>
                              <th scope='col'>Teacher</th>
                              <th scope='col'>Semester</th>
                              <th scope='col'>School Year</th>
                              <th scope='col'>Actions</th>
                            </tr>
                          </thead>
                          <tbody>";

                        $sql = "SELECT cs.*, s.section_name 
                          FROM classsubject cs
                          JOIN section s ON cs.section_id = s.section_id
                          WHERE cs.section_id = $sectionId";
                        $result = $conn->query($sql);
                        $num = 1;

                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $num . "</th>";
                            echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Teacher']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['school_year']) . "</td>";
                            echo "<td>
                                <button type='button' class='btn btn-success rounded-pill' data-bs-toggle='modal' data-bs-target='#editModal' 
                                data-id='" . $row['subject_id'] . "' 
                                data-name='" . htmlspecialchars($row['subject_name']) . "' 
                                data-teacher='" . htmlspecialchars($row['Teacher']) . "'
                                data-school-year='" . htmlspecialchars($row['school_year']) . "'
                                data-semester='" . htmlspecialchars($row['semester']) . "'
                                >
                                  <span><i class='bi bi-pencil-fill'></i></span>
                                </button>
                                <button type='button' class='btn btn-danger rounded-pill' data-id='" . $row['subject_id'] . "' data-bs-toggle='modal' data-bs-target='#deleteModal'><span><i class='bi bi-x-octagon'></i></span></button>
                              </td>";
                            echo "</tr>";

                            $num++;
                          }
                        } else {
                          echo "<tr><td colspan='6'>No subjects found</td></tr>";
                        }

                        echo "  </tbody>
                                </table>
                              </div>";
                        $firstSection = false;
                      }
                    }
                    ?>
                  </div><!-- End Bordered Tabs Justified -->











                  <!-- Edit Modal -->
                  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel">Edit Subject</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Form for editing subject -->
                          <form id="editForm" action="../adminprocess/edit_subject.php" method="post">
                            <input type="hidden" name="subject_id" id="editSubjectId">
                            <div class="mb-3">
                              <label for="editSubjectName" class="form-label">Subject Name</label>
                              <input type="text" class="form-control" id="editSubjectName" name="subject_name" required>
                            </div>
                            <div class="mb-3">
                              <label for="editTeacher" class="form-label">Teacher</label>
                              <input type="text" class="form-control" id="editTeacher" name="Teacher" required>
                            </div>
                            <div class="mb-3">
                              <label for="editSemester" class="form-label">Semester</label>
                              <select class="form-select" id="editSemester" name="semester" required>
                                <option value="1st Semester" selected>1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>

                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="editSchoolYear" class="form-label">School Year</label>
                              <input type="text" class="form-control" id="editSchoolYear" name="school_year" required>

                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>



                  <script>
                    var editModal = document.getElementById('editModal');
                    editModal.addEventListener('show.bs.modal', function(event) {
                      var button = event.relatedTarget; // Button that triggered the modal
                      var subjectId = button.getAttribute('data-id');
                      var subjectName = button.getAttribute('data-name');
                      var teacher = button.getAttribute('data-teacher');
                      var semester = button.getAttribute('data-semester');
                      var schoolYear = button.getAttribute('data-school-year');

                      // Populate the modal fields
                      editModal.querySelector('#editSubjectId').value = subjectId;
                      editModal.querySelector('#editSubjectName').value = subjectName;
                      editModal.querySelector('#editTeacher').value = teacher;
                      editModal.querySelector('#editSchoolYear').value = schoolYear;

                      // Set the selected semester
                      var semesterSelect = editModal.querySelector('#editSemester');
                      semesterSelect.value = semester;
                    });
                    document.addEventListener('DOMContentLoaded', function() {
                      var editModal = document.getElementById('editModal');
                      editModal.addEventListener('show.bs.modal', function(event) {
                        var button = event.relatedTarget;
                        var subjectId = button.getAttribute('data-id');
                        var subjectName = button.getAttribute('data-name');
                        var teacher = button.getAttribute('data-teacher');
                        var semester = button.getAttribute('data-semester');
                        var schoolYear = button.getAttribute('data-school-year');

                        editModal.querySelector('#editSubjectId').value = subjectId;
                        editModal.querySelector('#editSubjectName').value = subjectName;
                        editModal.querySelector('#editTeacher').value = teacher;
                        editModal.querySelector('#editSchoolYear').value = schoolYear;

                        var semesterSelect = editModal.querySelector('#editSemester');
                        semesterSelect.value = semester;
                      });
                    });
                  </script>




                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Delete Subject</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this subject?
                        </div>
                        <div class="modal-footer">
                          <form id="deleteForm" action="../adminprocess/delete_subject.php" method="post">
                            <input type="hidden" name="subject_id" id="deleteSubjectId">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <script>
                    // Handle Edit Button Click
                    document.querySelectorAll('button[data-bs-target="#editModal"]').forEach(button => {
                      button.addEventListener('click', () => {
                        const id = button.getAttribute('data-id');
                        // Set the subject_id in the hidden input
                        document.getElementById('editSubjectId').value = id;
                        // Fetch and populate the form fields if needed
                      });
                    });

                    // Handle Delete Button Click
                    document.querySelectorAll('button[data-bs-target="#deleteModal"]').forEach(button => {
                      button.addEventListener('click', () => {
                        const id = button.getAttribute('data-id');
                        // Set the subject_id in the hidden input
                        document.getElementById('deleteSubjectId').value = id;
                      });
                    });
                  </script>

                  <!-- End Table with stripped rows -->

                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  
               
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



                  <!-- Table with stripped rows -->
                  <!-- Table with Action Button -->
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Section</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT *FROM section ";
                      $result = $conn->query($sql);
                      $num1 = 1;

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<th scope='row'>" . $num1 . "</th>";
                          echo "<td>" . htmlspecialchars($row['section_name']) . "</td>";


                          // View Schedule Button
                          echo "<td>";
                          echo "<button type='button' class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#viewScheduleModal' data-id='" . htmlspecialchars($row['section_id']) . "' data-name='" . htmlspecialchars($row['section_name']) . "'>View Schedule</button> ";

                          // Edit/Add Schedule Button

                          // Example assuming you have the subject ID in $row['subject_id']
                          echo "<button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editScheduleModal' data-id='" . htmlspecialchars($row['section_id']) . "' data-name='" . htmlspecialchars($row['section_name']) . "'>Add Schedule</button>";



                          echo "</td>";



                          echo "</tr>";
                          $num1++;
                        }
                      } else {
                        echo "<tr><td colspan='3'>No sections found</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                  <!-- View/Edit Schedule Modal -->
                  <div class="modal fade" id="viewScheduleModal" tabindex="-1" aria-labelledby="viewScheduleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="viewScheduleModalLabel">View/Edit Schedule for Section</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Display section ID -->
                          <p id="sectionIdDisplay" class="fw-bold"></p>

                          <!-- The schedule details will be dynamically loaded here -->
                          <!-- The schedule details will be dynamically loaded here -->
                          <form id="editScheduleForm" method="POST" action="../adminprocess/updateSchedule.php">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Subject</th>
                                  <th>Day</th>
                                  <th>Start Time</th>
                                  <th>End Time</th>

                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody id="scheduleTableBody">
                                <!-- Schedule rows will be inserted here -->
                              </tbody>
                            </table>
                            <input type="hidden" name="section_id" id="editSectionId" value="">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save Changes</button>

                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>



                  <script>
                    // Event listener to handle when the view schedule modal is about to be shown
                    var viewScheduleModal = document.getElementById('viewScheduleModal');
                    viewScheduleModal.addEventListener('show.bs.modal', function(event) {
                      // Button that triggered the modal
                      var button = event.relatedTarget;

                      // Extract info from data-* attributes
                      var sectionId = button.getAttribute('data-id');
                      var sectionName = button.getAttribute('data-name');

                      // Set the section ID in the hidden input
                      document.getElementById('editSectionId').value = sectionId;

                      // Display the section ID in the <p> tag
                      document.getElementById('sectionIdDisplay').textContent = 'Section ID: ' + sectionId;

                      // Clear existing content
                      var scheduleTableBody = document.getElementById('scheduleTableBody');
                      scheduleTableBody.innerHTML = '<tr><td colspan="6">Loading schedule...</td></tr>';

                      // Fetch schedule data for the section
                      fetch('../adminprocess/getSchedule.php?section_id=' + sectionId)
                        .then(response => response.json())
                        .then(data => {
                          // Clear the loading message
                          scheduleTableBody.innerHTML = '';

                          // Populate the table with schedule data
                          if (data.length > 0) {
                            data.forEach(function(schedule, index) {
                              var rowHtml = `
                          <tr>
                            <td>${schedule.subject_name}</td>
                            <td>
                              <select class="form-select" name="meeting_days[${index}]" required>
                                <option value="Mon" ${schedule.meeting_days === 'Mon' ? 'selected' : ''}>Monday</option>
                                <option value="Tue" ${schedule.meeting_days === 'Tue' ? 'selected' : ''}>Tuesday</option>
                                <option value="Wed" ${schedule.meeting_days === 'Wed' ? 'selected' : ''}>Wednesday</option>
                                <option value="Thu" ${schedule.meeting_days === 'Thu' ? 'selected' : ''}>Thursday</option>
                                <option value="Fri" ${schedule.meeting_days === 'Fri' ? 'selected' : ''}>Friday</option>
                              </select>
                            </td>
                            <td>
                              <input type="time" class="form-control" name="startTimes[${index}]" value="${schedule.start_time}" required>
                            </td>
                            <td>
                              <input type="time" class="form-control" name="endTimes[${index}]" value="${schedule.end_time}" required>
                            </td>
                           
                            <td>
                              <button type="button" class="btn btn-danger btn-sm" data-schedule-id="${schedule.schedule_id}">Delete</button>
                            </td>
                            <input type="hidden" name="subjectIds[${index}]" value="${schedule.subject_id}">
                            <input type="hidden" name="scheduleIds[${index}]" value="${schedule.schedule_id}">
                          </tr>`;
                              scheduleTableBody.insertAdjacentHTML('beforeend', rowHtml);
                            });

                            // Event listener for delete buttons in the schedule table
                            document.querySelectorAll('#scheduleTableBody .btn-danger').forEach(button => {
                              button.addEventListener('click', function() {
                                var scheduleId = this.getAttribute('data-schedule-id');
                                if (confirm('Are you sure you want to delete this schedule?')) {
                                  fetch('../adminprocess/deleteSchedule.php', {
                                      method: 'POST',
                                      headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                      },
                                      body: 'schedule_id=' + encodeURIComponent(scheduleId),
                                    })
                                    .then(response => response.text())
                                    .then(result => {
                                      // Redirect back to the classSchedule.php to show the alert
                                      window.location.href = '../admin/classSchedule.php';
                                    })
                                    .catch(error => {
                                      console.error('Error deleting schedule:', error);
                                      alert('Error deleting schedule.');
                                    });
                                }
                              });
                            });

                          } else {
                            scheduleTableBody.innerHTML = '<tr><td colspan="6">No schedule found for this section.</td></tr>';
                          }
                        })
                        .catch(error => {
                          console.error('Error fetching schedule:', error);
                          var scheduleTableBody = document.getElementById('scheduleTableBody');
                          scheduleTableBody.innerHTML = '<tr><td colspan="6">Error loading schedule.</td></tr>';
                        });
                    });
                  </script>



                  <!-- Edit/Add Schedule Modal -->
                  <div class="modal fade" id="editScheduleModal" tabindex="-1" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editScheduleModalLabel">Edit/Add Schedule for Section</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Display section ID -->
                          <p id="sectionIdDisplay" class="fw-bold"></p>
                          <form id="editScheduleForm" class="row g-3" method="POST" action="../adminprocess/processEdit.php">
                            <div class="col-md-12">
                              <label for="subject" class="form-label">Subject</label>
                              <select class="form-select" id="subject" name="subject" required>
                                <option value="" disabled selected>Select Subject</option>
                                <?php
                                $sql = "SELECT subject_id, subject_name FROM classsubject";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . htmlspecialchars($row['subject_id']) . "'>" . htmlspecialchars($row['subject_name']) . "</option>";
                                  }
                                } else {
                                  echo "<option value='' disabled>No subjects found</option>";
                                }
                                ?>
                              </select>
                            </div>

                            <!-- Set the section ID using JavaScript -->
                            <input type="hidden" id="section" name="section" value="">

                            <!-- Meeting Days Container -->
                            <div id="meetingDaysContainer" class="col-md-12">
                              <!-- Meeting days and time inputs will be dynamically inserted here -->
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="saveChanges" name="saveChanges">Save Changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <script>
                    function fetchMeetingDays(subject_id) {
                      if (subject_id) {
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "../adminprocess/getMeetingDays.php?subject_id=" + subject_id, true);
                        xhr.onload = function() {
                          if (xhr.status === 200) {
                            var meetingDays = xhr.responseText.trim();
                            console.log("Meeting Days:", meetingDays); // Debugging line
                            var days = meetingDays.split(',');
                            var container = document.getElementById("meetingDaysContainer");
                            container.innerHTML = ""; // Clear previous content

                            days.forEach(function(day) {
                              day = day.trim();
                              if (day) {
                                var dayHtml = `
                              <div class="row mb-3">
                                <div class="col-md-6">
                                  <label for="${day.toLowerCase()}StartTime" class="form-label">${day} Start Time</label>
                                  <input type="time" class="form-control" id="${day.toLowerCase()}StartTime" name="startTimes[${day}]" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="${day.toLowerCase()}EndTime" class="form-label">${day} End Time</label>
                                  <input type="time" class="form-control" id="${day.toLowerCase()}EndTime" name="endTimes[${day}]" required>
                                </div>
                              </div>
                            `;
                                container.insertAdjacentHTML('beforeend', dayHtml);
                              }
                            });
                          } else {
                            console.error('Error fetching meeting days:', xhr.statusText);
                          }
                        };
                        xhr.onerror = function() {
                          console.error('Request failed');
                        };
                        xhr.send();
                      } else {
                        document.getElementById("meetingDaysContainer").innerHTML = ""; // Clear the meeting days if no subject selected
                      }
                    }

                    // Event listener to handle when the modal is about to be shown
                    var editScheduleModal = document.getElementById('editScheduleModal');
                    editScheduleModal.addEventListener('show.bs.modal', function(event) {
                      // Button that triggered the modal
                      var button = event.relatedTarget;

                      // Extract info from data-* attributes
                      var sectionId = button.getAttribute('data-id');
                      var subjectId = button.getAttribute('data-subject');

                      // Update the modal's content to display the section ID
                      var sectionIdDisplay = editScheduleModal.querySelector('#sectionIdDisplay');
                      sectionIdDisplay.textContent = 'Section ID: ' + sectionId;

                      // Set the value of the hidden input field
                      var sectionInput = editScheduleModal.querySelector('#section');
                      sectionInput.value = sectionId;

                      // Set the selected value of the subject dropdown
                      var subjectSelect = editScheduleModal.querySelector('#subject');
                      subjectSelect.value = subjectId;

                      // Fetch meeting days if a subject is selected
                      fetchMeetingDays(subjectId);
                    });

                    // Event listener for when the subject dropdown changes
                    document.getElementById('subject').addEventListener('change', function() {
                      var subjectId = this.value;
                      fetchMeetingDays(subjectId);
                    });
                  </script>






                  <!-- End Table with stripped rows -->
                </div>
              </div><!-- End Default Tabs -->


            </div>
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
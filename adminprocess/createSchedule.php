<?php
session_start();
include "../conn.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['addSchedule'])) {
  $subjectName = $_POST['subjectName']; // Make sure this matches the form field
  $startTime = $_POST['startTime'];
  $endTime = $_POST['endTime'];
  $classroomLocation = $_POST['classroomLocation'];
  $section = $_POST['section'];

  // Fetch meeting_days from the subject table
  $sql = "SELECT meeting_days FROM subject WHERE subject_name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $subjectName);
  $stmt->execute();
  $stmt->bind_result($meetingDays);
  $stmt->fetch();
  $stmt->close();

  // Map meeting_days to day_of_week
  $daysArray = explode(',', $meetingDays); // Assuming meeting_days is comma-separated

  if (empty($daysArray)) {
    $_SESSION['message'] = "Error: No meeting days found for the selected subject.";
    $_SESSION['msg_type'] = "danger";
  } else {
    foreach ($daysArray as $day) {
      $day = trim($day); // Remove any extra spaces
      switch ($day) {
        case 'Mon':
          $dayOfWeek = 'Monday';
          break;
        case 'Tues':
          $dayOfWeek = 'Tuesday';
          break;
        case 'Wed':
          $dayOfWeek = 'Wednesday';
          break;
        case 'Thurs':
          $dayOfWeek = 'Thursday';
          break;
        case 'Fri':
          $dayOfWeek = 'Friday';
          break;
        default:
          continue 2; // Skip this iteration if the day is not valid
      }

      // Insert schedule into the database
      $sql = "INSERT INTO classtimeschedule (subject_name, day_of_week, start_time, end_time, classroom_location, section)
              VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssssss", $subjectName, $dayOfWeek, $startTime, $endTime, $classroomLocation, $section);
      if ($stmt->execute()) {
        $_SESSION['message'] = "Schedule added successfully";
        $_SESSION['msg_type'] = "success";
      } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['msg_type'] = "danger";
      }
      $stmt->close();
    }
  }

  $conn->close();

  // Redirect to the form page to show the alert
  header("Location: ../admin/classSchedule.php"); // Replace with your form page
  exit();
}
?>

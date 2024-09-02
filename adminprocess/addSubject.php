<?php
// Include database connection file
include "../conn.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addSubject'])) {
    // Retrieve and sanitize form inputs
    $subjectName = $conn->real_escape_string($_POST['subjectName']);
    $subjectCode = $conn->real_escape_string($_POST['subjectCode']);
  
 
    $teacher = $conn->real_escape_string($_POST['teacher']);
    $section = (int)$_POST['section'];
    $meetingDays = isset($_POST['meetingDays']) ? implode(',', $_POST['meetingDays']) : '';
    $semester = $conn->real_escape_string($_POST['semester']);
    $schoolYear = $conn->real_escape_string($_POST['schoolYear']);

    // Prepare SQL statement
    $sql = "INSERT INTO classsubject (subject_name, subject_code, teacher, section_id, meeting_days, semester, school_year) 
            VALUES ('$subjectName', '$subjectCode', '$teacher', $section, '$meetingDays', '$semester', '$schoolYear')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Redirect with success message
        session_start();
        $_SESSION['message'] = "Subject added successfully.";
        $_SESSION['msg_type'] = "success";
        header("Location: ../admin/classSchedule.php");
    } else {
        // Redirect with error message
        session_start();
        $_SESSION['message'] = "Error: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
        header("Location: ../admin/classSchedule.php");
    }

    // Close connection
    $conn->close();
}
?>

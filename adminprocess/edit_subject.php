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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $subjectId = (int)$_POST['subject_id'];
    $subjectName = $conn->real_escape_string($_POST['subject_name']);
    $teacher = $conn->real_escape_string($_POST['Teacher']);
    $semester = $conn->real_escape_string($_POST['semester']);
    $schoolYear = $conn->real_escape_string($_POST['school_year']);

    // Prepare SQL statement
    $sql = "UPDATE classsubject 
            SET subject_name = '$subjectName', teacher = '$teacher', semester = '$semester', school_year = '$schoolYear' 
            WHERE subject_id = $subjectId";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Redirect with success message
        session_start();
        $_SESSION['message'] = "Subject updated successfully.";
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

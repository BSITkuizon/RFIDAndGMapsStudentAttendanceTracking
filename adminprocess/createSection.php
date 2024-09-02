<?php
// Start the session to use session variables
session_start();

// Include the database connection file
require_once '../conn.php'; // Adjust the path as needed

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $sectionName = trim($_POST['sectionName']);
    $adviser = trim($_POST['adviser']);

    // Basic validation: Check if required fields are filled
    if (empty($sectionName) || empty($adviser)) {
        // Set the error message and type in session
        $_SESSION['message'] = 'Please fill in all fields';
        $_SESSION['msg_type'] = 'danger';

        // Redirect back to the class schedule page
        header("Location: ../admin/classSchedule.php");
        exit();
    }

    // Sanitize input data to prevent XSS
    $sectionName = htmlspecialchars($sectionName);
    $adviser = htmlspecialchars($adviser);

    // Prepare the SQL statement
    $sql = "INSERT INTO section (section_name, section_adviser) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Set the error message and type in session for SQL prepare failure
        $_SESSION['message'] = 'Database error: ' . $conn->error;
        $_SESSION['msg_type'] = 'danger';

        // Redirect back to the class schedule page
        header("Location: ../admin/classSchedule.php");
        exit();
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $sectionName, $adviser);

    if ($stmt->execute()) {
        // Set the success message and type in session
        $_SESSION['message'] = 'Section added successfully';
        $_SESSION['msg_type'] = 'success';
    } else {
        // Set the error message and type in session for execution failure
        $_SESSION['message'] = 'Failed to add section: ' . $stmt->error;
        $_SESSION['msg_type'] = 'danger';
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

    // Redirect back to the class schedule page
    header("Location: ../admin/classSchedule.php");
    exit();
} else {
    // Set an error message for invalid request
    $_SESSION['message'] = 'Invalid request';
    $_SESSION['msg_type'] = 'danger';

    // Redirect back to the class schedule page
    header("Location: ../admin/classSchedule.php");
    exit();
}
?>

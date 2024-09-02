<?php
// Include your database connection file
session_start(); // Start the session
include('../conn.php'); // Adjust path if necessary

// Check if the subject_id is set in the POST request
if (isset($_POST['subject_id'])) {
    // Get the subject_id from the POST request
    $subject_id = intval($_POST['subject_id']);

    // Prepare a SQL statement to delete the subject
    $sql = "DELETE FROM classsubject WHERE subject_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the subject_id parameter
        $stmt->bind_param("i", $subject_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Set success message in session
            $_SESSION['message'] = "Subject deleted successfully";
            $_SESSION['msg_type'] = "success";
        } else {
            // Set detailed error message in session
            $_SESSION['message'] = "Error deleting subject: " . $stmt->error;
            $_SESSION['msg_type'] = "danger";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Set error message in session if the statement could not be prepared
        $_SESSION['message'] = "Error preparing statement: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }

    // Close the database connection
    $conn->close();
} else {
    // Set error message in session if no subject_id is set
    $_SESSION['message'] = "Invalid request";
    $_SESSION['msg_type'] = "danger";
}

// Redirect to the classSchedule page
header("Location: ../admin/classSchedule.php");
exit();
?>

<?php
session_start();
include '../conn.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rfid_number = $_POST['rfid_number'];

    // Prepare and execute SQL query to delete the student
    $sql = "DELETE FROM students WHERE rfid_number = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $rfid_number);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Record deleted successfully";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Error deleting record: " . $stmt->error;
            $_SESSION['msg_type'] = "danger";
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = "Error preparing statement: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }
}

$conn->close();

// Redirect back to the referring page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>

<?php
session_start(); // Start the session to access session variables

// Include database connection
include '../conn.php'; // Adjust the path to your database connection file

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $scheduleId = isset($_POST['schedule_id']) ? $_POST['schedule_id'] : '';

    if (empty($scheduleId)) {
        $_SESSION['msg_type'] = 'danger';
        $_SESSION['message'] = 'Schedule ID is required.';
        echo json_encode(['status' => 'error', 'message' => 'Schedule ID is required.']);
        exit();
    }

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete schedule entry
        $stmt = $conn->prepare("DELETE FROM class_schedule WHERE schedule_id = ?");
        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }

        $stmt->bind_param('s', $scheduleId);
        $stmt->execute();
        $stmt->close();

        // Commit transaction
        $conn->commit();
        $_SESSION['msg_type'] = 'success';
        $_SESSION['message'] = 'Schedule deleted successfully.';
        echo json_encode(['status' => 'success', 'message' => 'Schedule deleted successfully.']);
        
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $_SESSION['msg_type'] = 'danger';
        $_SESSION['message'] = 'Error deleting schedule: ' . $e->getMessage();
        echo json_encode(['status' => 'error', 'message' => 'Error deleting schedule: ' . $e->getMessage()]);
    }

    // Close database connection
    $conn->close();
} else {
    $_SESSION['msg_type'] = 'danger';
    $_SESSION['message'] = 'Invalid request method.';
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

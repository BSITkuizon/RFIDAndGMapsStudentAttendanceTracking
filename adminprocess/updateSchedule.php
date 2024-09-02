<?php
session_start(); // Start session to use session variables

// Include database connection
include '../conn.php'; // Adjust the path to your database connection file

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $sectionId = isset($_POST['section_id']) ? $_POST['section_id'] : '';
    $subjectIds = isset($_POST['subjectIds']) ? $_POST['subjectIds'] : [];
    $meetingDays = isset($_POST['meeting_days']) ? $_POST['meeting_days'] : [];
    $startTimes = isset($_POST['startTimes']) ? $_POST['startTimes'] : [];
    $endTimes = isset($_POST['endTimes']) ? $_POST['endTimes'] : [];
    $scheduleIds = isset($_POST['scheduleIds']) ? $_POST['scheduleIds'] : [];

    // Validate required inputs
    if (empty($sectionId)) {
        $_SESSION['message'] = 'Section ID is required.';
        $_SESSION['msg_type'] = 'danger';
        header('Location: ../admin/classSchedule.php');
        exit();
    }

    // Allowed meeting days
    $allowedDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Update existing schedule entries
        foreach ($subjectIds as $index => $subjectId) {
            $meetingDay = isset($meetingDays[$index]) ? $meetingDays[$index] : '';
            $startTime = isset($startTimes[$index]) ? $startTimes[$index] : '';
            $endTime = isset($endTimes[$index]) ? $endTimes[$index] : '';
            $scheduleId = isset($scheduleIds[$index]) ? $scheduleIds[$index] : '';

            // Validate times
            if (empty($subjectId) || empty($startTime) || empty($endTime) || !in_array($meetingDay, $allowedDays)) {
                continue; // Skip incomplete or invalid entries
            }

            // Update existing entry
            $stmt = $conn->prepare("
                UPDATE class_schedule
                SET meeting_days = ?, start_time = ?, end_time = ?
                WHERE schedule_id = ?
            ");

            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            $stmt->bind_param('sssi', $meetingDay, $startTime, $endTime, $scheduleId);
            $stmt->execute();
            $stmt->close();
        }

        // Commit transaction
        $conn->commit();

        $_SESSION['message'] = 'Schedule updated successfully!';
        $_SESSION['msg_type'] = 'success';
        header('Location: ../admin/classSchedule.php');
        exit(); // Ensure no further code is executed

    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $_SESSION['message'] = 'Error updating schedule: ' . $e->getMessage();
        $_SESSION['msg_type'] = 'danger';
        header('Location: ../admin/classSchedule.php');
        exit();
    }

    // Close database connection
    $conn->close();
    
} else {
    $_SESSION['message'] = 'Invalid request method.';
    $_SESSION['msg_type'] = 'danger';
    header('Location: ../admin/classSchedule.php');
    exit();
}
?>

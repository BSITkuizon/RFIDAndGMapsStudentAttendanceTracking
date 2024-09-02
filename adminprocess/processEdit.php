<?php
// Include database connection
include '../conn.php'; // Adjust the path to your database connection file

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $sectionId = isset($_POST['section']) ? $_POST['section'] : '';
    $subjectId = isset($_POST['subject']) ? $_POST['subject'] : '';
    
    // Handle meeting days and times
    $startTimes = isset($_POST['startTimes']) ? $_POST['startTimes'] : [];
    $endTimes = isset($_POST['endTimes']) ? $_POST['endTimes'] : [];
    
    // Validate required inputs
    if (empty($sectionId) || empty($subjectId)) {
        $_SESSION['message'] = 'Section ID and Subject are required.';
        $_SESSION['msg_type'] = 'danger'; // Bootstrap class for error
        header('Location: ../admin/classSchedule.php');
        exit();
    }

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Update existing schedule entries
        foreach ($startTimes as $day => $startTime) {
            $endTime = isset($endTimes[$day]) ? $endTimes[$day] : '';

            // Validate times
            if (empty($startTime) || empty($endTime)) {
                continue; // Skip incomplete entries
            }

            // Check if an entry for this day already exists
            $stmt = $conn->prepare("SELECT COUNT(*) FROM class_schedule WHERE section_id = ? AND subject_id = ? AND meeting_days = ?");
            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            $stmt->bind_param('sss', $sectionId, $subjectId, $day);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            if ($count > 0) {
                // Update existing entry
                $stmt = $conn->prepare("UPDATE class_schedule SET start_time = ?, end_time = ? WHERE section_id = ? AND subject_id = ? AND meeting_days = ?");
                if ($stmt === false) {
                    throw new Exception('Prepare failed: ' . $conn->error);
                }

                $stmt->bind_param('sssss', $startTime, $endTime, $sectionId, $subjectId, $day);
                $stmt->execute();
                $stmt->close();
            } else {
                // Insert new entry
                $stmt = $conn->prepare("INSERT INTO class_schedule (section_id, subject_id, meeting_days, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    throw new Exception('Prepare failed: ' . $conn->error);
                }

                $stmt->bind_param('sssss', $sectionId, $subjectId, $day, $startTime, $endTime);
                $stmt->execute();
                $stmt->close();
            }
        }

        // Commit transaction
        $conn->commit();

        $_SESSION['message'] = 'Schedule updated successfully!';
        $_SESSION['msg_type'] = 'success'; // Bootstrap class for success
        header('Location: ../admin/classSchedule.php');
        exit(); // Ensure no further code is executed

    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $_SESSION['message'] = 'Error updating schedule: ' . $e->getMessage();
        $_SESSION['msg_type'] = 'danger'; // Bootstrap class for error
        header('Location: ../admin/classSchedule.php');
        exit(); // Ensure no further code is executed
    }

    // Close database connection
    $conn->close();
    
} else {
    $_SESSION['message'] = 'Invalid request method.';
    $_SESSION['msg_type'] = 'danger'; // Bootstrap class for error
    header('Location: ../admin/classSchedule.php');
    exit(); // Ensure no further code is executed
}
?>

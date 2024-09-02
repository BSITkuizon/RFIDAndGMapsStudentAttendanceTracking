<?php
// Include database connection
include '../conn.php'; // Adjust the path to your database connection file

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

header('Content-Type: application/json');

if (isset($_GET['section_id'])) {
    $sectionId = $_GET['section_id'];

    // Validate section ID
    if (empty($sectionId)) {
        echo json_encode(['error' => 'Section ID is required']);
        exit();
    }

    try {
        // Prepare and execute SQL query
        $stmt = $conn->prepare("
            SELECT cs.schedule_id, cs.subject_id, cs.meeting_days, cs.start_time, cs.end_time, 
                   sub.subject_name 
            FROM class_schedule cs
            JOIN classsubject sub ON cs.subject_id = sub.subject_id
            WHERE cs.section_id = ?
        ");

        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }

        $stmt->bind_param('s', $sectionId);
        $stmt->execute();
        $result = $stmt->get_result();

        $schedules = [];
        while ($row = $result->fetch_assoc()) {
            $schedules[] = $row;
        }

        $stmt->close();
        $conn->close();

        echo json_encode($schedules);

    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'No section_id parameter provided']);
}

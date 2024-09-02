<?php
// Include database connection
include '../conn.php';

if (isset($_GET['subject_id'])) {
    $subject_id = intval($_GET['subject_id']);

    $sql = "SELECT meeting_days FROM classsubject WHERE subject_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("i", $subject_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo htmlspecialchars($row['meeting_days']);
    } else {
        echo ""; // Return an empty string if no meeting days found
    }

    $stmt->close();
} else {
    echo "No subject_id parameter provided.";
}

$conn->close();
?>


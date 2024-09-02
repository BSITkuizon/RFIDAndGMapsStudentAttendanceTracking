<?php
session_start();  // Ensure you start the session at the beginning of the script
include '../conn.php';  // Adjust the path as needed

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rfid_number = $_POST['rfid'];
    $rfid_number = $conn->real_escape_string($rfid_number);

    // Get current date and time
    $current_date = date('Y-m-d');
    $current_time = date('H:i:s');

    // Fetch student ID based on RFID number
    $sql = "SELECT stud_id FROM students WHERE rfid_number = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $rfid_number);
        $stmt->execute();
        $stmt->bind_result($stud_id);
        $stmt->fetch();
        $stmt->close();

        if ($stud_id) {
            // Check if the current time falls within any scheduled class
            $sql = "SELECT * FROM class_schedule WHERE section_id IN (
                        SELECT section_id FROM students WHERE stud_id = ?
                    ) AND meeting_days LIKE CONCAT('%', DAYNAME(CURDATE()), '%') 
                    AND start_time <= ? AND end_time >= ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sss", $stud_id, $current_time, $current_time);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Check if attendance has already been recorded for today
                    $sql = "SELECT * FROM attendance WHERE stud_id = ? AND attendance_date_taken = ?";
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("is", $stud_id, $current_date);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $_SESSION['message'] = 'Attendance already recorded for today';
                            $_SESSION['msg_type'] = 'warning';
                        } else {
                            // Record the attendance
                            $sql = "INSERT INTO attendance (rfid_number, stud_id, attendance_date_taken, status) VALUES (?, ?, ?, 'present')";
                            if ($stmt = $conn->prepare($sql)) {
                                $stmt->bind_param("sis", $rfid_number, $stud_id, $current_date);
                                if ($stmt->execute()) {
                                    $_SESSION['message'] = 'Attendance recorded successfully';
                                    $_SESSION['msg_type'] = 'success';
                                } else {
                                    $_SESSION['message'] = 'Failed to record attendance';
                                    $_SESSION['msg_type'] = 'danger';
                                }
                                $stmt->close();
                            } else {
                                $_SESSION['message'] = 'Error preparing statement';
                                $_SESSION['msg_type'] = 'danger';
                            }
                        }
                        $stmt->close();
                    } else {
                        $_SESSION['message'] = 'Error preparing statement';
                        $_SESSION['msg_type'] = 'danger';
                    }
                } else {
                    $_SESSION['message'] = 'No class scheduled at this time';
                    $_SESSION['msg_type'] = 'warning';
                }
                $stmt->close();
            } else {
                $_SESSION['message'] = 'Error preparing statement';
                $_SESSION['msg_type'] = 'danger';
            }
        } else {
            $_SESSION['message'] = 'RFID number not found';
            $_SESSION['msg_type'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'Error preparing statement';
        $_SESSION['msg_type'] = 'danger';
    }
}

$conn->close();

// Redirect back to the attendance page with the session message
header("Location: ../admin/attendance.php");
exit();

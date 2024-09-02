<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "finalcapstone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $student_id_number = $_POST['student_id_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $section_id = $_POST['section_id'];  // Updated to section_id
    $rfid_number = $_POST['rfid_number'];
    $student_pass = $student_id_number;

    // Check for duplicates
    $duplicate_check_sql = "SELECT * FROM students WHERE student_id_number = ?";
    $stmt = $conn->prepare($duplicate_check_sql);
    $stmt->bind_param('s', $student_id_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['message'] = "Student with ID number already exists!";
        $_SESSION['msg_type'] = "danger";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Set default profile image based on gender
        $profile_image_url = ($gender == 'Male') ? '../DefaultProfile/MaleDefaultProfile.png' : '../DefaultProfile/FemaleDefaultProfile.png';

        // Prepare and execute the insert statement
        $sql = "INSERT INTO students (first_name, middle_name, last_name, email, student_id_number, password, date_of_birth, gender, address, section_id, rfid_number, profile_image_url)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssssssss', $first_name, $middle_name, $last_name, $email, $student_id_number, $student_pass, $date_of_birth, $gender, $address, $section_id, $rfid_number, $profile_image_url);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Student added successfully!";
            $_SESSION['msg_type'] = "success";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            error_log("Error: " . $stmt->error);
            $_SESSION['message'] = "Error adding student: " . $stmt->error;
            $_SESSION['msg_type'] = "danger";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<?php
session_start(); // Start the session

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalcapstone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ['xls', 'xlsx'];

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "<script>alert('Invalid file type. Only Excel files are allowed.');</script>";
    } else {
        // Extract the base name and append the date
        $baseName = pathinfo($fileName, PATHINFO_FILENAME);
        $newFileName = $baseName . " - " . date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
        $targetDirectory = __DIR__ . "/../uploads/" . $newFileName; // Use __DIR__ for absolute path

        if (!is_dir(__DIR__ . "/../uploads")) {
            mkdir(__DIR__ . "/../uploads", 0777, true); // Create directory if it doesn't exist
        }

        if (move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory)) {
            require '../excelReader/excel_reader2.php';
            require '../excelReader/SpreadsheetReader.php';

            try {
                $reader = new SpreadsheetReader($targetDirectory);
                foreach ($reader as $row) {
                    // Skip empty rows
                    if (empty(array_filter($row))) {
                        continue;
                    }

                    $first_name = mysqli_real_escape_string($conn, $row[0]);
                    $middle_name = mysqli_real_escape_string($conn, $row[1]);
                    $last_name = mysqli_real_escape_string($conn, $row[2]);
                    $email = mysqli_real_escape_string($conn, $row[3]);
                    $student_id_number = mysqli_real_escape_string($conn, $row[4]);
                    $password = mysqli_real_escape_string($conn, $row[5]);
                    $date_of_birth = mysqli_real_escape_string($conn, $row[6]);
                    $gender = mysqli_real_escape_string($conn, $row[7]);
                    $address = mysqli_real_escape_string($conn, $row[8]);
                    $section_id = mysqli_real_escape_string($conn, $row[9]); // Change from section to section_id
                    $rfid_number = mysqli_real_escape_string($conn, $row[10]);

                    // Set default profile image based on gender
                    $profile_image_url = ($gender == 'Male') ? '../DefaultProfile/MaleDefaultProfile.png' : '../DefaultProfile/FemaleDefaultProfile.png';
                    
                    // Check if section_id exists in the section table
                    $checkSectionQuery = "SELECT section_id FROM section WHERE section_id = '$section_id'";
                    $sectionResult = mysqli_query($conn, $checkSectionQuery);

                    if (mysqli_num_rows($sectionResult) == 0) {
                        throw new Exception("Error: section_id $section_id does not exist in the section table.");
                    }

                    $query = "INSERT INTO students (first_name, middle_name, last_name, email, student_id_number, password, date_of_birth, gender, address, section_id, rfid_number, profile_image_url) VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$student_id_number', '$password', '$date_of_birth', '$gender', '$address', '$section_id', '$rfid_number', '$profile_image_url')";

                    if (!mysqli_query($conn, $query)) {
                        throw new Exception("Error inserting data: " . mysqli_error($conn));
                    }
                }
                $_SESSION['success'] = "Successfully Imported"; // Set success message in session
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            } catch (Exception $e) {
                echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
            }
        } else {
            echo "<script>alert('Error uploading file.');</script>";
        }
    }
}

// Close connection
$conn->close();
?>

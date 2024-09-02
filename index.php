<?php
session_start();

// Database credentials
$host = 'localhost'; // Change to your database host
$dbname = 'finalcapstone'; // Change to your database name
$username = 'root'; // Change to your database username
$password = ''; // Change to your database password

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Initialize error variable
$error = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $login_username = trim($_POST['username'] ?? '');
    $login_password = trim($_POST['password'] ?? '');

    // Debug: Log the username and password
    error_log("Attempting login with username: " . $login_username);

    // Check if user is a student or admin
    if (preg_match('/^\d+$/', $login_username)) {
        // Student login
        $query = "SELECT * FROM students WHERE student_id_number = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $login_username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debug: Log fetched user data
        error_log("Fetched user data: " . print_r($user, true));

        if ($user && $login_password === $user['password']) {
             // Password is correct
    $_SESSION['user_type'] = 'student';
    $_SESSION['user_id'] = $user['student_id_number'];
    $_SESSION['first_name'] = $user['first_name']; // Set first_name in session
    $_SESSION['middle_name'] = $user['middle_name']; // Set middle_name in session
    $_SESSION['last_name'] = $user['last_name']; // Set last_name in session
    $_SESSION['profile_image_url'] = $user['profile_image_url']; // Set profile image URL in session
     
            header('Location: student/student_dashboard.php'); // Redirect to student dashboard
            exit();
        } else {
            // Invalid credentials
            $error = "Invalid student ID or password.";
        }
    } else {
        // Admin login
        $query = "SELECT * FROM admins WHERE admin_username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $login_username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debug: Log fetched user data
        error_log("Fetched user data: " . print_r($user, true));

        if ($user && $login_password === $user['admin_password']) {
            // Password is correct
            $_SESSION['user_type'] = 'admin';
            $_SESSION['user_id'] = $user['admin_username'];
            $_SESSION['admin_name'] = $user['admin_name']; // Set admin_name in session
            $_SESSION['admin_role'] = $user['admin_role']; // Set role in session
            header('Location: admin/dashboard.php'); // Redirect to admin dashboard
            exit();
        } else {
            // Invalid credentials
            $error = "Invalid admin username or password.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Login - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="NiceAdmin/assets/img/favicon.png" rel="icon">
    <link href="NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="NiceAdmin/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                    
                                    <img src="img/mnhs.png" alt="MNHS Logo" style="max-width: 100px; height: auto;">
                                    </div>
                                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <span class="d-none d-lg-block">Matalom National High School</span>
                                    </a>
                              
                            </div><!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-center pb-0 fs-4">Welcome 😊</h5>
                                 
                                    <?php if ($error) : ?>
                                        <p class="text-danger text-center"><?= htmlspecialchars($error) ?></p>
                                    <?php endif; ?>
                                    <form method="post" action="">
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="username" class="form-control" id="yourUsername" placeholder="Student ID / Admin ID" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have an account? <a href="pages-register.html">Create an account</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="NiceAdmin/assets/vendor/quill/quill.js"></script>
    <script src="NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="NiceAdmin/assets/js/main.js"></script>

</body>

</html>
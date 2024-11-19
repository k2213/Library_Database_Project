<?php
include('../db_connection.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = ['exists' => false];

    if (isset($_POST['student_id'])) {
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $check_query = "SELECT * FROM user WHERE User_ID = '$student_id'";
        $check_result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            $response['exists'] = true;
        }
    }

    if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_query = "SELECT * FROM user WHERE Email = '$email'";
        $check_result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            $response['exists'] = true;
        }
    }

    echo json_encode($response);
    exit;
}
?>

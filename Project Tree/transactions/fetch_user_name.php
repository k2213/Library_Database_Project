<?php 
include('../db_connection.php');

if ($conn) {
    if (isset($_POST['user_id'])) {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $query = "SELECT User_Name FROM User WHERE User_ID='$user_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo json_encode(["user_name" => htmlspecialchars($row['User_Name'])]);
            } else {
                echo json_encode(["error" => "User ID not found"]);
            }
        } else {
            echo json_encode(["error" => "Error executing query: " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["error" => "User ID not provided"]);
    }
} else {
    echo json_encode(["error" => "Database connection failed"]);
}
?>

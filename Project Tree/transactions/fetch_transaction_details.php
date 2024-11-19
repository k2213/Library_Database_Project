<?php
include('../db_connection.php');

if ($conn) {
    if (isset($_POST['transaction_id'])) {
        $transaction_id = mysqli_real_escape_string($conn, $_POST['transaction_id']);
        $query = "SELECT * FROM Transactions WHERE Transaction_ID='$transaction_id'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $row['User_Name'] = htmlspecialchars($row['User_Name']);
            $row['Book_Title'] = htmlspecialchars($row['Book_Title']);
            echo json_encode($row);
        } else {
            echo json_encode(["error" => "Transaction not found"]);
        }
    } else {
        echo json_encode(["error" => "Transaction ID not provided"]);
    }
} else {
    echo json_encode(["error" => "Database connection failed"]);
}
?>

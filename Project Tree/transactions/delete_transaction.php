<?php
include('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['transaction_id'])) {
        $transaction_id = mysqli_real_escape_string($conn, $_POST['transaction_id']);
        $query = "DELETE FROM transactions WHERE Transaction_ID = '$transaction_id'";

        if (mysqli_query($conn, $query)) {
            echo "Transaction deleted successfully!";
        } else {
            echo "Error deleting transaction: " . mysqli_error($conn);
        }
    } else {
        echo "Transaction ID not provided.";
    }
} else {
    echo "Invalid request method.";
}
?>

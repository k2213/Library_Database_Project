<?php
include('../db_connection.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transaction_id = mysqli_real_escape_string($conn, $_POST['transaction_id']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $book_isbn = mysqli_real_escape_string($conn, $_POST['book_isbn']);
    $borrow_date = mysqli_real_escape_string($conn, $_POST['borrow_date']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $return_date = isset($_POST['return_date']) && !empty($_POST['return_date']) ? mysqli_real_escape_string($conn, $_POST['return_date']) : NULL;

    // Check if required fields are empty
    if (empty($transaction_id) || empty($user_id) || empty($book_isbn) || empty($borrow_date) || empty($due_date)) {
        echo "<script>alert('All fields except return date must be filled.');</script>";
        exit;
    }

    // Fetch User_Name from User table
    $user_name_query = "SELECT User_Name FROM User WHERE User_ID = '$user_id'";
    $user_name_result = mysqli_query($conn, $user_name_query);
    if (mysqli_num_rows($user_name_result) > 0) {
        $user_name_row = mysqli_fetch_assoc($user_name_result);
        $user_name = mysqli_real_escape_string($conn, $user_name_row['User_Name']);
    } else {
        echo "<script>alert('User not found.');</script>";
        exit;
    }

    // Fetch Book_Title from Books table
    $book_title_query = "SELECT Book_Title FROM Books WHERE Book_ISBN = '$book_isbn'";
    $book_title_result = mysqli_query($conn, $book_title_query);
    if (mysqli_num_rows($book_title_result) > 0) {
        $book_title_row = mysqli_fetch_assoc($book_title_result);
        $book_title = mysqli_real_escape_string($conn, $book_title_row['Book_Title']);
    } else {
        echo "<script>alert('Book not found.');</script>";
        exit;
    }

    // Handle optional return date
    $return_date_query = $return_date ? "'$return_date'" : "NULL"; // Set to NULL if return_date is empty

    // Update transaction query including User_Name and Book_Title
    $query = "UPDATE Transactions SET 
                User_ID = '$user_id',
                User_Name = '$user_name',
                Book_ISBN = '$book_isbn',
                Book_Title = '$book_title',
                Borrow_Date = '$borrow_date',
                Due_Date = '$due_date',
                Return_Date = $return_date_query,
                Status = '$status' 
              WHERE Transaction_ID = '$transaction_id'";

    // Execute query and handle response
    if (mysqli_query($conn, $query)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "Transaction updated successfully!";
        } else {
            echo "<script>alert('No changes made. Transaction may already have these values.'); window.location.href = 'transactions.php';</script>";
        }
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

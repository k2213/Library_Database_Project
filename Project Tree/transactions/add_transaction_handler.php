<?php
include('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $book_isbn = mysqli_real_escape_string($conn, $_POST['book_isbn']);
    $borrow_date = mysqli_real_escape_string($conn, $_POST['borrow_date']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);

    $query = "INSERT INTO Transactions (User_ID, User_Name, Book_ISBN, Book_Title, Borrow_Date, Due_Date, Status) 
              VALUES ('$user_id', (SELECT User_Name FROM User WHERE User_ID='$user_id'), 
                      '$book_isbn', (SELECT Book_Title FROM Books WHERE Book_ISBN='$book_isbn'), 
                      '$borrow_date', '$due_date', 'Borrowed')";

    if (mysqli_query($conn, $query)) {
        echo json_encode(["success" => true, "message" => "Transaction added successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>

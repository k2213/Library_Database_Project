<?php
include('../db_connection.php');

if (isset($_POST['book_isbn'])) {
    $book_isbn = mysqli_real_escape_string($conn, $_POST['book_isbn']);
    $query = "SELECT Book_Title FROM Books WHERE Book_ISBN='$book_isbn'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(["book_title" => htmlspecialchars($row['Book_Title'])]);
        } else {
            echo json_encode(["error" => "Book ISBN not found"]);
        }
    } else {
        echo json_encode(["error" => "Error executing query: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["error" => "Book ISBN not provided"]);
}
?>

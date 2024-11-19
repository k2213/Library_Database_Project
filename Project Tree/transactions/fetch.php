<?php
include('../db_connection.php');

if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
    SELECT * FROM transactions 
    WHERE User_Name LIKE '%" . $search . "%' 
    OR Book_Title LIKE '%" . $search . "%' 
    OR User_ID LIKE '%" . $search . "%' 
    OR Transaction_ID LIKE '%" . $search . "%'
    ";
} else {
    $query = "SELECT * FROM transactions ORDER BY Transaction_ID";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(["error" => "Error executing query: " . mysqli_error($conn)]);
    exit;
}

if (mysqli_num_rows($result) > 0) {
    $output = '<table id="searchResultsTable"> 
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Book ISBN</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                    <th>Return Date</th>
                </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>
                        <td>' . htmlspecialchars($row["Transaction_ID"]) . '</td>
                        <td>' . htmlspecialchars($row["Status"]) . '</td>
                        <td>' . htmlspecialchars($row["User_ID"]) . '</td>
                        <td>' . htmlspecialchars($row["User_Name"]) . '</td>
                        <td>' . htmlspecialchars($row["Book_ISBN"]) . '</td>
                        <td>' . htmlspecialchars($row["Book_Title"]) . '</td>
                        <td>' . htmlspecialchars($row["Borrow_Date"]) . '</td>
                        <td>' . htmlspecialchars($row["Due_Date"]) . '</td>
                        <td>' . htmlspecialchars($row["Return_Date"]) . '</td>
                    </tr>';
    }
    $output .= '</table>';
} else {
    $output = '<tr><td colspan="9">No data found for your search query.</td></tr>';
}

echo $output;
?>

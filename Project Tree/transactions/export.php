<?php
include('../db_connection.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="transactions.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, ['Transaction ID', 'Status', 'User ID', 'User Name', 'Book ISBN', 'Book Title', 'Borrow Date', 'Due Date', 'Return Date']);

$sql = "SELECT * FROM Transactions ORDER BY Transaction_ID DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    fputcsv($output, ['No transactions found']);
}

fclose($output);
exit;
?>

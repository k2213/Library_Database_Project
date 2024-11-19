<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login/login.php");
        exit();
    }
    include('db_connection.php');

    $borrowedCount = $conn->query("SELECT COUNT(*) AS count FROM transactions WHERE Status IN ('Borrowed', 'Overdue')")->fetch_assoc()['count'];
    $overdueCount = $conn->query("SELECT COUNT(*) AS count FROM transactions WHERE Status = 'Overdue'")->fetch_assoc()['count'];
    ?>

    <header>
        <div class="logo">
            <img width="40" height="40" src="https://img.icons8.com/comic/100/open-book.png" alt="open-book" class="icon-image" />
            <span class="title">Library Database</span>
        </div>
        <div class="nav-buttons">
            <button class="nav-button" onclick="window.location.href='../user/user.php';">User</button>
            <button class="nav-button active">Checkout</button>
            <button class="nav-button" onclick="window.location.href='../books/books.php';">Books</button>
        </div>
        <div class="profile-box">
            <button class="logout" onclick="window.location.href='logout.php';">Logout</button>
        </div>
    </header>

    <div class="top-bar">
        <div class="stats">
            <span class="stat-item">Borrowed: <strong><?php echo $borrowedCount; ?></strong></span>
            <span class="stat-item">Overdue: <strong><?php echo $overdueCount; ?></strong></span>
        </div>
        <div class="search-bar">
            <div class="form-group">
                <input type="text" name="search_text" id="search_text" placeholder="Search by Transaction Details" class="form-control" />
            </div>
        </div>
        <button class="export" onclick="window.location.href='export.php';">Export</button>
        <button class="manage-btn">Manage</button>
        <button class="new-add">Add</button>
    </div>

    <div id="searchModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="searchModalClose">&times;</span>
            <h2>Search Results</h2>
            <div id="result"></div>
        </div>
    </div>

    <div class="table-section">
        <table>
            <thead>
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
                </tr>
            </thead>
            <tbody>
                <?php
                $limit = 13;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $start = ($page > 1) ? ($page * $limit) - $limit : 0;
                $total = $conn->query("SELECT COUNT(*) as total FROM transactions")->fetch_assoc()['total'];
                $pages = ceil($total / $limit);
                $sql = "SELECT * FROM transactions ORDER BY Transaction_ID DESC LIMIT {$start}, {$limit}";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Transaction_ID']}</td>
                                <td>{$row['Status']}</td>
                                <td>{$row['User_ID']}</td>
                                <td>{$row['User_Name']}</td>
                                <td>{$row['Book_ISBN']}</td>
                                <td>{$row['Book_Title']}</td>
                                <td>{$row['Borrow_Date']}</td>
                                <td>{$row['Due_Date']}</td>
                                <td>{$row['Return_Date']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No transactions found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <div class="pagination">
            <button onclick="changePage(<?php echo max(1, $page - 1); ?>)">⮜</button>
            <span class="current-page"><?php echo $page; ?> of <?php echo $pages; ?></span>
            <button onclick="changePage(<?php echo min($pages, $page + 1); ?>)">⮞</button>
        </div>
    </div>

    <div id="newAddTransactionModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="addModalClose">&times;</span>
            <h2><strong>Add New Transaction</strong></h2>
            <form id="newAddTransactionForm">
                <label for="new_user_id">User ID:</label>
                <input type="text" id="new_user_id" name="user_id" required>

                <label for="new_user_name">User Name:</label>
                <input type="text" id="new_user_name" name="user_name" readonly>

                <label for="new_book_isbn">Book ISBN:</label>
                <input type="text" id="new_book_isbn" name="book_isbn" required>

                <label for="new_book_title">Book Title:</label>
                <input type="text" id="new_book_title" name="book_title" readonly>

                <label for="new_borrow_date">Borrow Date:</label>
                <input type="date" id="new_borrow_date" name="borrow_date" required>

                <label for="new_due_date">Due Date:</label>
                <input type="date" id="new_due_date" name="due_date" required>

                <input type="submit" value="Add Transaction" class="submit-button">
            </form>
        </div>
    </div>

    <div id="manageTransactionModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="manageModalClose">&times;</span>
            <h2>Manage Transaction</h2>
            <form id="manageTransactionForm">
                <input type="hidden" id="manage_transaction_id" name="transaction_id">
                <label for="manage_user_id">User ID:</label>
                <input type="text" id="manage_user_id" name="user_id" required>

                <label for="manage_user_name">User Name:</label>
                <input type="text" id="manage_user_name" name="user_name" readonly>

                <label for="manage_book_isbn">Book ISBN:</label>
                <input type="text" id="manage_book_isbn" name="book_isbn" required>

                <label for="manage_book_title">Book Title:</label>
                <input type="text" id="manage_book_title" name="book_title" readonly>

                <label for="manage_borrow_date">Borrow Date:</label>
                <input type="date" id="manage_borrow_date" name="borrow_date" required>

                <label for="manage_due_date">Due Date:</label>
                <input type="date" id="manage_due_date" name="due_date" required>

                <label for="manage_status">Status:</label>
                <select id="manage_status" name="status">
                    <option value="Borrowed">Borrowed</option>
                    <option value="Overdue">Overdue</option>
                    <option value="Returned">Returned</option>
                </select>

                <label for="manage_return_date">Return Date:</label>
                <input type="date" id="manage_return_date" name="return_date">

                <div class="button-container">
                <button type="submit" class="submit-button">Update</button>
                <button type="button" class="delete-btn">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.new-add').click(function() {
            $('#newAddTransactionModal').show();
        });

        $('#addModalClose').click(function() {
            $('#newAddTransactionModal').hide();
        });

        $(window).click(function(event) {
            if (event.target === document.getElementById('newAddTransactionModal')) {
                $('#newAddTransactionModal').hide();
            }
        });

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: { query: search },
                    success: function(data) {
                        $('#result').html(data);
                        $('#searchModal').show();
                    }
                });
            } else {
                $('#result').html('');
                $('#searchModal').hide();
            }
        });

        $('#searchModalClose').click(function() {
            $('#searchModal').hide();
        });

        $(window).click(function(event) {
            if (event.target === document.getElementById('searchModal')) {
                $('#searchModal').hide();
            }
        });

        $('.manage-btn').click(function() {
            var transactionId = prompt("Enter the Checkout ID you want to manage:");
            if (transactionId) {
                $.ajax({
                    url: "fetch_transaction_details.php",
                    method: "POST",
                    data: { transaction_id: transactionId },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#manage_transaction_id').val(data.Transaction_ID);
                            $('#manage_user_id').val(data.User_ID);
                            $('#manage_user_name').val(data.User_Name);
                            $('#manage_book_isbn').val(data.Book_ISBN);
                            $('#manage_book_title').val(data.Book_Title);
                            $('#manage_borrow_date').val(data.Borrow_Date);
                            $('#manage_due_date').val(data.Due_Date);
                            $('#manage_status').val(data.Status);
                            $('#manage_return_date').val(data.Return_Date);
                            $('#manageTransactionModal').show();
                        } else {
                            alert("Transaction not found.");
                        }
                    },
                    error: function() {
                        alert("Error fetching transaction details.");
                    }
                });
            }
        });

        $('#manageModalClose').click(function() {
            $('#manageTransactionModal').hide();
        });

        $(window).click(function(event) {
            if (event.target === document.getElementById('manageTransactionModal')) {
                $('#manageTransactionModal').hide();
            }
        });

        $('#new_user_id').on('change', function() {
            var user_id = $(this).val();
            if (user_id != '') {
                $.ajax({
                    url: "fetch_user_name.php",
                    method: "POST",
                    data: { user_id: user_id },
                    dataType: "json",
                    success: function(response) {
                        if (response.user_name) {
                            $('#new_user_name').val(response.user_name);
                        } else {
                            alert("User ID not found.");
                            $('#new_user_name').val('');
                        }
                    },
                    error: function() {
                        alert("Error fetching user name.");
                    }
                });
            } else {
                $('#new_user_name').val('');
            }
        });

        $('#new_book_isbn').on('change', function() {
            var book_isbn = $(this).val();
            if (book_isbn != '') {
                $.ajax({
                    url: "fetch_book_title.php",
                    method: "POST",
                    data: { book_isbn: book_isbn },
                    dataType: "json",
                    success: function(response) {
                        if (response.book_title) {
                            $('#new_book_title').val(response.book_title);
                        } else {
                            alert("Book ISBN not found.");
                            $('#new_book_title').val('');
                        }
                    },
                    error: function() {
                        alert("Error fetching book title.");
                    }
                });
            } else {
                $('#new_book_title').val('');
            }
        });

        $('#manage_user_id').on('change', function() {
            var user_id = $(this).val();
            if (user_id != '') {
                $.ajax({
                    url: "fetch_user_name.php",
                    method: "POST",
                    data: { user_id: user_id },
                    dataType: "json",
                    success: function(response) {
                        if (response.user_name) {
                            $('#manage_user_name').val(response.user_name);
                        } else {
                            alert("User ID not found.");
                            $('#manage_user_name').val('');
                        }
                    },
                    error: function() {
                        alert("Error fetching user name.");
                    }
                });
            } else {
                $('#manage_user_name').val('');
            }
        });

        $('#manage_book_isbn').on('change', function() {
            var book_isbn = $(this).val();
            if (book_isbn != '') {
                $.ajax({
                    url: "fetch_book_title.php",
                    method: "POST",
                    data: { book_isbn: book_isbn },
                    dataType: "json",
                    success: function(response) {
                        if (response.book_title) {
                            $('#manage_book_title').val(response.book_title);
                        } else {
                            alert("Book ISBN not found.");
                            $('#manage_book_title').val('');
                        }
                    },
                    error: function() {
                        alert("Error fetching book title.");
                    }
                });
            } else {
                $('#manage_book_title').val('');
            }
        });

        $('#newAddTransactionForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: 'add_transaction_handler.php',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        $('#newAddTransactionModal').hide();
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('Error occurred while adding the transaction.');
                }
            });
        });

        $('#manageTransactionForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: 'update_transaction.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function() {
                    alert('Error occurred while updating the transaction.');
                }
            });
        });

        $('.delete-btn').click(function() {
            var transactionId = $('#manage_transaction_id').val();
            if (confirm("Are you sure you want to delete this transaction?")) {
                $.ajax({
                    url: 'delete_transaction.php',
                    method: 'POST',
                    data: { transaction_id: transactionId },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error details:", jqXHR.responseText);
                        alert('Error occurred while deleting the transaction: ' + textStatus + ' - ' + errorThrown);
                    }
                });
            }
        });
    });

    function changePage(page) {
        window.location.href = "?page=" + page;
    }
    </script>

    <footer>
        <p>&copy; 2024 Library Management System</p>
        <p>Brought to you by DBSM Group 3</p>
    </footer>

</body>
</html>

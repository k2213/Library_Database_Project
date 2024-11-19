<?php
session_start();
include '../db_connection.php'; // Include your database connection file

// Initialize variables
$error_message = '';
$userIdentifier = '';
$password = '';

// Admin credentials
$adminUsername = 'admin';
$adminPassword = 'admin'; // Change this to the desired admin password

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if both user_identifier and password are set
    if (isset($_POST['user_identifier']) && isset($_POST['password'])) {
        $userIdentifier = trim($_POST['user_identifier']);
        $password = trim($_POST['password']);

        // Validate input
        if (empty($userIdentifier) || empty($password)) {
            $error_message = 'Please enter both User ID/Email and Password.';
        } else {
            // Check for admin credentials
            if ($userIdentifier === $adminUsername && $password === $adminPassword) {
                // Successful admin login
                $_SESSION['user_id'] = $adminUsername; // Store admin username in session
                header('Location: ../transactions/transactions.php');
                exit;
            }

            // Prepare SQL statement to check if user exists
            $stmt = $conn->prepare("SELECT * FROM user WHERE User_ID = ? OR Email = ?");
            if (!$stmt) {
                $error_message = 'Database error: Unable to prepare statement.';
            } else {
                $stmt->bind_param("ss", $userIdentifier, $userIdentifier); // Bind both User ID and Email
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    // Check password
                    if (password_verify($password, $row['Password'])) {
                        // Successful login
                        $_SESSION['user_id'] = $row['User_ID']; // Store user ID in session
                        $_SESSION['user_name'] = $row['User_Name']; // Store user name in session
                        header('Location: ../dashboard/dashboard.php');
                        exit;
                    } else {
                        // Incorrect password
                        $error_message = 'Incorrect password!';
                    }
                } else {
                    // User ID or Email does not exist
                    $error_message = 'Username or email does not exist. Create user instead?';
                }

                // Close the statement
                $stmt->close();
            }
        }
    } else {
        // Handle missing parameters
        $error_message = 'Invalid request.';
    }
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library Management System</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your main CSS file -->
</head>
<body>
    <div id="notification" style="color:red;"></div> <!-- Placeholder for notification -->
    
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="login-container">
        <form class="login-form" method="POST" action="">
            <h2>Welcome back!</h2>
            <p class="subheading">Please sign in to access your account</p>
            <div class="form-group">
                <label for="user_identifier">User ID or Email</label>
                <input type="text" id="user_identifier" name="user_identifier" placeholder="Enter your Identification number or email" value="<?php echo htmlspecialchars($userIdentifier); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group remember-me">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit">Login</button>
            <p class="sign-up">Don't have an account? <a href="../signup/signup.php">Sign up</a></p>
        </form>
    </div>

    <script>
        // Show notification if there is an error message
        const errorMessage = "<?php echo addslashes($error_message); ?>";
        if (errorMessage) {
            showNotification(errorMessage);
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.innerText = message;
            notification.style.position = 'fixed';
            notification.style.top = '10px';
            notification.style.right = '10px';
            notification.style.backgroundColor = 'rgba(255, 0, 0, 0.8)';
            notification.style.color = '#fff';
            notification.style.padding = '10px';
            notification.style.borderRadius = '5px';
            notification.style.zIndex = '1000';
            document.body.appendChild(notification);

            // Remove the notification after a few seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
</body>
</html>

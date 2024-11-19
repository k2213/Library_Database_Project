<?php
include('../db_connection.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>showError('Passwords do not match!');</script>";
        exit;
    }

    // Check if student ID or email already exists
    $check_query = "SELECT * FROM user WHERE User_ID = '$student_id' OR Email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Error if the User ID or Email already exists
        $existing_user = mysqli_fetch_assoc($check_result);
        if ($existing_user['User_ID'] == $student_id) {
            echo "<script>showError('Error: User ID already exists!');</script>";
        } elseif ($existing_user['Email'] == $email) {
            echo "<script>showError('Error: Email already exists!');</script>";
        }
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Combine first name and last name to create User_Name
    $user_name = $first_name . ' ' . $last_name;

    // Insert user details into the database
    $query = "INSERT INTO user (User_ID, User_Name, Email, Phone_Number, School, Password) 
              VALUES ('$student_id', '$user_name', '$email', '$phone', '$department', '$hashed_password')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('User created successfully! Redirecting to login...'); window.location.href = '../login/login.php';</script>";
    } else {
        echo "<script>showError('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Library Management System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Basic styling */
        .error-message {
            display: none;
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 0, 0, 0.8);
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }
        input.invalid {
            border: 2px solid red;
        }

        /* Styling for the fixed background bubbles */
        .background {
            position: fixed; /* Keep it fixed to cover the screen */
            z-index: 1; /* Lower than the signup-container to ensure it stays behind */
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: hidden; /* Prevent any overflow */
        }

        .shape {
            width: 100px;
            height: 100px;
            background-color: rgba(255, 255, 255, 0.1); /* Faint white/transparent color */
            position: absolute;
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-30px);
            }
            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="shape" style="top: 10%; left: 10%;"></div>
        <div class="shape" style="top: 30%; left: 70%;"></div>
        <div class="shape" style="top: 50%; left: 40%;"></div>
        <div class="shape" style="top: 70%; left: 20%;"></div>
        <div class="shape" style="top: 90%; left: 60%;"></div>
    </div>
    <div class="signup-container">
        <form class="signup-form" id="signup-form" method="POST" action="">
            <h2>Welcome to our Library Database!</h2>
            <p class="subheading">Sign up to borrow and see available books</p>
            <div class="form-group">
                <label for="first_name">First Name(s)</label>
                <input type="text" id="first_name" name="first_name" placeholder="Enter your first name(s)" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
            </div>
            <div class="form-group">
                <label for="student_id">Student/Staff ID</label>
                <input type="text" id="student_id" name="student_id" placeholder="Enter your 10-digit ID" maxlength="10" pattern="\d{10}" required>
                <small class="error-message" id="student-id-error">ID must be exactly 10 digits.</small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <small class="error-message" id="email-error">Invalid email address.</small>
            </div>
            <div class="form-group">
                <label for="department">School</label>
                <select id="department" name="department" required>
                    <option value="">Select your school</option>
                    <option value="Agricultural Sciences">Agricultural Sciences</option>
                    <option value="Education">Education</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Graduate School of Business">Graduate School of Business</option>
                    <option value="Health Sciences">Health Sciences</option>
                    <option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
                    <option value="Law">Law</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Mines">Mines</option>
                    <option value="Natural Sciences">Natural Sciences</option>
                    <option value="Nursing Sciences">Nursing Sciences</option>
                    <option value="Public Health">Public Health</option>
                    <option value="Veterinary Medicine">Veterinary Medicine</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <div class="phone-group">
                    <span class="phone-code">+260</span>
                    <input type="text" id="phone" name="phone" placeholder="Enter 9 digits" maxlength="9" pattern="\d{9}" required>
                    <small class="error-message" id="phone-error">Phone number must be 9 digits.</small>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" minlength="8" required>
                <small class="error-message" id="password-error">Password must be at least 8 characters long,<br> include letters and numbers, and cannot contain your Student/Staff ID.</small>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required>
            </div>
            <button type="submit">Sign Up</button>
            <p class="login-link">Already have an account? <a href="../login/login.php">Login</a></p>
        </form>
    </div>

    <script>
        const studentID = document.getElementById('student_id');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const phone = document.getElementById('phone');

        function showError(message) {
            const notification = document.createElement('div');
            notification.innerHTML = message; // Use innerHTML for line breaks
            notification.style.position = 'fixed';
            notification.style.top = '10px';
            notification.style.right = '10px';
            notification.style.backgroundColor = 'rgba(255, 0, 0, 0.8)';
            notification.style.color = 'white';
            notification.style.padding = '10px';
            notification.style.borderRadius = '5px';
            notification.style.zIndex = '1000';
            document.body.appendChild(notification);
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Validation listeners for student ID, email, password, and phone
        studentID.addEventListener('blur', function() {
            if (studentID.value.length !== 10 || isNaN(studentID.value)) {
                studentID.classList.add('invalid');
                showError('Student ID must be exactly 10 digits.');
            } else {
                studentID.classList.remove('invalid');
            }
        });

        email.addEventListener('blur', function() {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value)) {
                email.classList.add('invalid');
                showError('Invalid email address.');
            } else {
                email.classList.remove('invalid');
            }
        });

        phone.addEventListener('blur', function() {
            if (phone.value.length !== 9 || isNaN(phone.value)) {
                phone.classList.add('invalid');
                showError('Phone number must be exactly 9 digits.');
            } else {
                phone.classList.remove('invalid');
            }
        });

        password.addEventListener('blur', function() {
            if (password.value.length < 8) {
                password.classList.add('invalid');
                showError('Password must be at least 8 characters.');
            } else {
                password.classList.remove('invalid');
            }
        });

        confirmPassword.addEventListener('blur', function() {
            if (confirmPassword.value !== password.value) {
                confirmPassword.classList.add('invalid');
                showError('Passwords do not match.');
            } else {
                confirmPassword.classList.remove('invalid');
            }
        });
    </script>
</body>
</html>

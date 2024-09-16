<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password and confirm password
    if ($password !== $confirm_password) {
        $errorMessage['password_not_match'] = 'Passwords do not match!';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password using password_hash()

        // Check for connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if username already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errorMessage['user_already_exist'] = 'Username already taken!';
        } else {
            // Proceed with registration
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param('ss', $username, $hashedPassword);

            if ($stmt->execute()) {
                // Redirect to login page with an alert
                echo "<script>
                        alert('Registration successful! Please login.');
                        window.location.href = 'login.php';
                      </script>";
                exit;
            } else {
                $errorMessage = "Error: " . $stmt->error;
            }
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="form-container">
        <form method="post" action="register.php">
            <h3>Register</h3>
            <input type="text" name="username" placeholder="Username" required class="box">

            <p class="error"><?php echo (!empty($errorMessage['user_already_exist']) ? $errorMessage['user_already_exist'] : '') ?></p>

            <input type="password" name="password" placeholder="Password" required class="box">
            <input type="password" name="confirm_password" placeholder="Confirm Password" required class="box">

            <p class="error"><?php echo (!empty($errorMessage['password_not_match']) ? $errorMessage['password_not_match'] : '') ?></p>

            <input type="submit" name="submit" value="register now" class="btn">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>
    </div>
</body>

</html>
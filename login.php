<?php
session_start();

$errorMessage = []; // Initialize error message array

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check for empty fields
  if (empty($username) || empty($password)) {
    $errorMessage['empty_fields'] = 'Username and Password are required!';
  } else {
    $conn = new mysqli('localhost', 'root', '', 'task_tracker');

    // Check for connection errors
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare statement to check the username
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $hashed_password);

    // Check if user exists
    if ($stmt->num_rows > 0) {
      $stmt->fetch();
      // Verify the password using md5 (matching register.php)
      if (md5($password) === $hashed_password) {
        $_SESSION['user_id'] = $user_id;
        header("Location: add_task.php");
        exit;
      } else {
        $errorMessage['invalid_password'] = 'Invalid password!';
      }
    } else {
      $errorMessage['user_not_found'] = 'User not found!';
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
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="form-container">
    <form method="post" action="login.php">
      <h3>Login</h3>
      <input type="text" name="username" placeholder="Username" required class="box">
      <input type="password" name="password" placeholder="Password" required class="box">

      <!-- Display error messages -->
      <p class="error"><?php echo (!empty($errorMessage['empty_fields']) ? $errorMessage['empty_fields'] : '') ?></p>
      <p class="error"><?php echo (!empty($errorMessage['user_not_found']) ? $errorMessage['user_not_found'] : '') ?></p>
      <p class="error"><?php echo (!empty($errorMessage['invalid_password']) ? $errorMessage['invalid_password'] : '') ?></p>

      <input type="submit" name="submit" value="Login" class="btn">
      <p>Don't have an account? <a href="register.php">Register now</a></p>
    </form>
  </div>
</body>

</html>
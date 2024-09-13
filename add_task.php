<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $completion_date = $_POST['completion_date'];
  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description, completion_date) VALUES (?, ?, ?, ?)");
  $stmt->bind_param('isss', $user_id, $title, $description, $completion_date);

  if ($stmt->execute()) {
    echo "<script>alert('Task added successfully!');</script>";
  } else {
    echo "<script>alert('Error: " . $stmt->error . "');</script>";
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Task</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php include 'header.php' ?>

  <div class="form-container2">
    <form method="post" action="add_task.php">
      <h3>Add Task</h3>
      <input type="text" name="title" placeholder="Task Title" required class="box">
      <textarea name="description" placeholder="Task Description" class="box input_text"></textarea>
      <input type="datetime-local" name="completion_date" required class="box">
      <button type="submit" class="btn">Add Task</button>
    </form>
  </div>

  <?php include 'footer.php' ?>
  <script src="script.js"></script>
</body>

</html>
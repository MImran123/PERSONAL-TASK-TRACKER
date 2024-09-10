<?php
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

  $conn = new mysqli('localhost', 'root', '', 'task_tracker');
  $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description, completion_date) VALUES (?, ?, ?, ?)");
  $stmt->bind_param('isss', $user_id, $title, $description, $completion_date);

  if ($stmt->execute()) {
    echo "Task added successfully!";
  } else {
    echo "Error: " . $stmt->error;
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
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php include 'header.php' ?>

  <form method="post" action="add_task.php">
    <input type="text" name="title" placeholder="Task Title" required>
    <textarea name="description" placeholder="Task Description"></textarea>
    <input type="datetime-local" name="completion_date" required>
    <button type="submit">Add Task</button>
  </form>
</body>

</html>
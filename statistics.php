<?php
session_start();

// Check if the user is an admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
  header("Location: login.php");
  exit;
}

include 'config.php';

// Initialize variables for stats
$total_tasks = $tasks_today = $tasks_new = $tasks_in_progress = $tasks_completed = $average_tasks_per_user = 0;

// Fetch statistics
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Total number of tasks
$result = $conn->query("SELECT COUNT(*) AS total_tasks FROM tasks");
if ($result) {
  $row = $result->fetch_assoc();
  $total_tasks = $row['total_tasks'];
}

// Total number of tasks created today
$result = $conn->query("SELECT COUNT(*) AS tasks_today FROM tasks WHERE DATE(created_at) = CURDATE()");
if ($result) {
  $row = $result->fetch_assoc();
  $tasks_today = $row['tasks_today'];
}

// Total number of tasks in each state
$result = $conn->query("SELECT 
                            SUM(CASE WHEN status = 'New' THEN 1 ELSE 0 END) AS tasks_new,
                            SUM(CASE WHEN status = 'In Progress' THEN 1 ELSE 0 END) AS tasks_in_progress,
                            SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) AS tasks_completed
                        FROM tasks");
if ($result) {
  $row = $result->fetch_assoc();
  $tasks_new = $row['tasks_new'];
  $tasks_in_progress = $row['tasks_in_progress'];
  $tasks_completed = $row['tasks_completed'];
}

// Average number of tasks per user
$result = $conn->query("SELECT COUNT(DISTINCT user_id) AS total_users FROM tasks");
if ($result) {
  $row = $result->fetch_assoc();
  $total_users = $row['total_users'];
  $average_tasks_per_user = ($total_users > 0) ? ($total_tasks / $total_users) : 0;
}

// Fetch all tasks with username
$tasks_result = $conn->query("
    SELECT tasks.id, tasks.description, tasks.status, tasks.created_at, users.username
    FROM tasks
    JOIN users ON tasks.user_id = users.id
    ORDER BY tasks.created_at DESC
");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Task Statistics</title>

  <!-- Font Awesome CDN link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Custom Admin CSS -->
  <link rel="stylesheet" href="css/admin_style.css">
</head>

<body>

  <?php include 'admin_header.php'; ?>

  <!-- Task Statistics Section -->
  <section class="dashboard">
    <h1 class="title">Task Statistics</h1>
    <div class="box-container">
      <div class="box">
        <h3><?php echo $total_tasks; ?></h3>
        <p>Total number of tasks created</p>
      </div>
      <div class="box">
        <h3><?php echo $tasks_today; ?></h3>
        <p>Total number of tasks created today</p>
      </div>
      <div class="box">
        <h3><?php echo $tasks_new; ?></h3>
        <p>Total number of tasks in "New" state</p>
      </div>
      <div class="box">
        <h3><?php echo $tasks_in_progress; ?></h3>
        <p>Total number of tasks in "In Progress" state</p>
      </div>
      <div class="box">
        <h3><?php echo $tasks_completed; ?></h3>
        <p>Total number of tasks in "Completed" state</p>
      </div>
      <div class="box">
        <h3><?php echo number_format($average_tasks_per_user, 2); ?></h3>
        <p>Average number of tasks per user</p>
      </div>
    </div>
  </section>

  <!-- Custom Admin JS -->
  <script src="js/admin_script.js"></script>

</body>

</html>
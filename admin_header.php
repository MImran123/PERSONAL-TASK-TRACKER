<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Header</title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>

<body>
<ul class="header">
    <li><a href="statistics.php">Statistics</a></li>
    <li><a href="add_task.php">Add Task</a></li>
    <li><a href="tasks_list.php">Tasks List</a></li>
    <li><a href="all_tasks.php">All Tasks</a></li>
    <li><a href="#" id="logout-link">Logout</a></li>
</ul>

  <!-- Modal HTML -->
  <div id="logoutModal" class="modal">
    <div class="modal-content">
      <p>Are you sure you want to log out?</p>
      <button id="confirmLogout">Yes</button>
      <button id="cancelLogout">No</button>
    </div>
  </div>

  <!-- Link the external JS file -->
  <script src="script.js"></script>
</body>

</html>
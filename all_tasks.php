<?php
include 'config.php';

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
  header("Location: login.php");
  exit;
}

// Pagination variables
$tasks_per_page = 5; // Number of tasks to display per page
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $tasks_per_page;

// Retrieve tasks for all users with pagination
$total_tasks_result = $conn->query("SELECT COUNT(*) AS total FROM tasks");
$total_tasks = $total_tasks_result->fetch_assoc()['total'];
$total_pages = ceil($total_tasks / $tasks_per_page);

$tasks_result = $conn->query("
    SELECT tasks.id, tasks.description, tasks.status, tasks.created_at, users.username
    FROM tasks
    JOIN users ON tasks.user_id = users.id
    ORDER BY tasks.created_at DESC
    LIMIT $tasks_per_page OFFSET $offset
");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Tasks</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php include 'admin_header.php'; ?>

  <h1 class="heading">All Tasks</h1>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Created By</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($task = $tasks_result->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($task['id']); ?></td>
            <td><?php echo htmlspecialchars($task['description']); ?></td>
            <td><?php echo htmlspecialchars($task['status']); ?></td>
            <td><?php echo htmlspecialchars($task['created_at']); ?></td>
            <td><?php echo htmlspecialchars($task['username']); ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination Links -->
  <div class="pagination">
    <?php if ($current_page > 1): ?>
      <a href="all_tasks.php?page=<?php echo $current_page - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <a href="all_tasks.php?page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>>
        <?php echo $i; ?>
      </a>
    <?php endfor; ?>

    <?php if ($current_page < $total_pages): ?>
      <a href="all_tasks.php?page=<?php echo $current_page + 1; ?>">Next</a>
    <?php endif; ?>
  </div>

  <?php include 'footer.php'; ?>

</body>

</html>
<?php
include 'config.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $task_id = $_POST['task_id'];
  $status = $_POST['status'];

  $stmt = $conn->prepare("UPDATE tasks SET status=? WHERE id=? AND user_id=?");
  $stmt->bind_param('sii', $status, $task_id, $_SESSION['user_id']);
  $stmt->execute();
}

// Pagination variables
$tasks_per_page = 5; // Number of tasks to display per page
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $tasks_per_page;

// Retrieve tasks for the logged-in user with pagination
$user_id = $_SESSION['user_id'];
$total_tasks_result = $conn->query("SELECT COUNT(*) AS total FROM tasks WHERE user_id=$user_id");
$total_tasks = $total_tasks_result->fetch_assoc()['total'];
$total_pages = ceil($total_tasks / $tasks_per_page);

$result = $conn->query("SELECT id, title, description, completion_date, status FROM tasks WHERE user_id=$user_id LIMIT $tasks_per_page OFFSET $offset");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task List</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>


  <?php include 'header.php'; ?>

  <h1 class="heading">Task List</h1>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Completion Date</th>
          <th>Status</th>
          <th>Change Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo htmlspecialchars($row['completion_date']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td>
              <form method="post" action="tasks_list.php?page=<?php echo $current_page; ?>">
                <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                <select name="status">
                  <option value="New" <?php if ($row['status'] == 'New') echo 'selected'; ?>>New</option>
                  <option value="In Progress" <?php if ($row['status'] == 'In Progress') echo 'selected'; ?>>In Progress</option>
                  <option value="Completed" <?php if ($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                </select>
                <button type="submit">Update</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination Links -->
  <div class="pagination">
    <?php if ($current_page > 1): ?>
      <a href="tasks_list.php?page=<?php echo $current_page - 1; ?>">; Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <a href="tasks_list.php?page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>>
        <?php echo $i; ?>
      </a>
    <?php endfor; ?>

    <?php if ($current_page < $total_pages): ?>
      <a href="tasks_list.php?page=<?php echo $current_page + 1; ?>">Next ;</a>
    <?php endif; ?>
  </div>

  <?php $conn->close(); ?>

  <?php include 'footer.php'; ?>
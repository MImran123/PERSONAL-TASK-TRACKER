<?php
include 'config.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  echo json_encode(['error' => 'Not authenticated']);
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $task_id = $_POST['task_id'];
  $status = $_POST['status'];

  $stmt = $conn->prepare("UPDATE tasks SET status=? WHERE id=? AND user_id=?");
  $stmt->bind_param('sii', $status, $task_id, $_SESSION['user_id']);
  if ($stmt->execute()) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['error' => 'Failed to update']);
  }
} else {
  echo json_encode(['error' => 'Invalid request method']);
}

$conn->close();

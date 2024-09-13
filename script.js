// Get elements
const logoutLink = document.getElementById("logout-link");
const logoutModal = document.getElementById("logoutModal");
const confirmLogout = document.getElementById("confirmLogout");
const cancelLogout = document.getElementById("cancelLogout");

// Show the modal when the logout link is clicked
logoutLink.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent default action (navigating to logout.php)
  logoutModal.style.display = "flex"; // Show the modal
});

// Handle the 'Yes' button click
confirmLogout.addEventListener("click", function () {
  window.location.href = "logout.php"; // Redirect to logout.php on confirmation
});

// Handle the 'No' button click
cancelLogout.addEventListener("click", function () {
  logoutModal.style.display = "none"; // Hide the modal on cancel
});

// Hide modal when clicking outside of it
window.addEventListener("click", function (event) {
  if (event.target == logoutModal) {
    logoutModal.style.display = "none";
  }
});

// Update task status when the 'Update Status' button is clicked using AJAX

$(document).ready(function () {
  $('select[name="status"]').on("change", function () {
    var form = $(this).closest("form");
    var taskId = form.data("task-id");
    var status = $(this).val();

    $.ajax({
      url: "update_task.php",
      type: "POST",
      data: {
        task_id: taskId,
        status: status,
      },
      success: function (response) {
        var data = JSON.parse(response);
        if (data.success) {
          alert("Task status updated successfully!");
        }
      },
    });
  });
});

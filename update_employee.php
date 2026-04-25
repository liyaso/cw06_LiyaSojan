<?php require "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Employee</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">
<div class="demo-shell">
  <div class="demo-card">
    <h1 class="demo-title">Update Employee Salary</h1>
    <p class="demo-subtitle">Update a specific employee record by ID</p>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id     = (int)$_POST['emp_id'];
      $salary = $_POST['salary'];

      $stmt = $conn->prepare(
        "UPDATE employees SET salary = ? WHERE emp_id = ?"
      );
      $stmt->bind_param("di", $salary, $id);

      if ($stmt->execute()) {
        if ($stmt->affected_rows === 1) {
          echo '<div class="demo-msg success">Success! Row updated.</div>';
        } else {
          echo '<div class="demo-msg error">No row found with that ID.</div>';
        }
      } else {
        echo '<div class="demo-msg error">Error: ' . $stmt->error . '</div>';
      }
      $stmt->close();
    }
    ?>

    <form method="POST" action="">
      <div class="demo-grid">
        <div class="demo-field">
          <label>Employee ID</label>
          <input class="demo-input" type="number" name="emp_id" required>
        </div>
        <div class="demo-field">
          <label>New Salary</label>
          <input class="demo-input" type="number" step="0.01" name="salary" required>
        </div>
      </div>
      <div class="demo-actions">
        <button class="demo-btn" type="submit">Update Salary</button>
        <a class="demo-btn" href="read_employees.php">View All Records</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
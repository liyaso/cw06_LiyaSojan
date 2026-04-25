<?php require "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Demo</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">
<div class="demo-shell">
  <div class="demo-card">
    <h1 class="demo-title">Add Employee</h1>
    <p class="demo-subtitle">Submit the form to insert a new employee record</p>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = $_POST['emp_name'];
      $job = $_POST['job_name'];
      $salary = $_POST['salary'];
      $hire = $_POST['hire_date'];
      $deptId = (int)$_POST['department_id'];
      $dept = $_POST['department_name'];

      $stmt = $conn->prepare(
        "INSERT INTO employees (emp_name, job_name, salary, hire_date, department_id, department_name)
         VALUES (?, ?, ?, ?, ?, ?)"
      );
      $stmt->bind_param("ssdsis", $name, $job, $salary, $hire, $deptId, $dept);

      if ($stmt->execute()) {
        echo '<div class="demo-msg success">Success! Inserted ID: ' . $stmt->insert_id . '</div>';
      } else {
        echo '<div class="demo-msg error">Error: ' . $stmt->error . '</div>';
      }
      $stmt->close();
    }
    ?>

    <form method="POST" action="">
      <div class="demo-grid">
        <div class="demo-field">
          <label>Name</label>
          <input class="demo-input" type="text" name="emp_name" required>
        </div>
        <div class="demo-field">
          <label>Job Title</label>
          <input class="demo-input" type="text" name="job_name" required>
        </div>
        <div class="demo-field">
          <label>Salary</label>
          <input class="demo-input" type="number" step="0.01" name="salary" required>
        </div>
        <div class="demo-field">
          <label>Hire Date</label>
          <input class="demo-input" type="date" name="hire_date" required>
        </div>
        <div class="demo-field">
          <label>Department ID</label>
          <input class="demo-input" type="number" name="department_id" required>
        </div>
        <div class="demo-field">
          <label>Department Name</label>
          <input class="demo-input" type="text" name="department_name" required>
        </div>
      </div>
      <div class="demo-actions">
        <button class="demo-btn" type="submit">Add Employee</button>
        <a class="demo-btn" href="read_employees.php">View All Records</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
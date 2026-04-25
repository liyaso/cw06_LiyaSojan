<?php require "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Employees</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">
<div class="demo-shell">
  <div class="demo-card">
    <h1 class="demo-title">All Employees</h1>
    <p class="demo-subtitle">Records fetched live from MySQL</p>

    <table style="width:100%; border-collapse:collapse; color:var(--demo-text);">
      <thead>
        <tr style="border-bottom: 1px solid var(--demo-border);">
          <th style="padding:.5rem; text-align:left;">ID</th>
          <th style="padding:.5rem; text-align:left;">Name</th>
          <th style="padding:.5rem; text-align:left;">Job</th>
          <th style="padding:.5rem; text-align:left;">Salary</th>
          <th style="padding:.5rem; text-align:left;">Hire Date</th>
          <th style="padding:.5rem; text-align:left;">Department</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT * FROM employees ORDER BY emp_id DESC");
        while ($row = $result->fetch_assoc()) {
          echo "<tr style='border-bottom: 1px solid var(--demo-border);'>";
          echo "<td style='padding:.5rem;'>" . htmlspecialchars($row['emp_id']) . "</td>";
          echo "<td style='padding:.5rem;'>" . htmlspecialchars($row['emp_name']) . "</td>";
          echo "<td style='padding:.5rem;'>" . htmlspecialchars($row['job_name']) . "</td>";
          echo "<td style='padding:.5rem;'>$" . htmlspecialchars($row['salary']) . "</td>";
          echo "<td style='padding:.5rem;'>" . htmlspecialchars($row['hire_date']) . "</td>";
          echo "<td style='padding:.5rem;'>" . htmlspecialchars($row['department_name']) . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <div class="demo-actions">
      <a class="demo-btn" href="employee_demo.php">Add New Employee</a>
      <a class="demo-btn" href="update_employee.php">Update Salary</a>
      <a class="demo-btn" href="delete_employee.php">Delete Employee</a>
    </div>
  </div>
</div>
</body>
</html>
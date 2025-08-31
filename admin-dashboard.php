<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
  header("Location: admin-login.php");
  exit();
}

// DB connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "lifestyle_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$result = $conn->query($sql);

// ✅ Delete if delete_id is passed in URL
if (isset($_GET['delete_id'])) {
  $delete_id = intval($_GET['delete_id']);

  // Step 1: Delete the row
  $conn->query("DELETE FROM contact_messages WHERE id = $delete_id");

  // Step 2: Reset IDs from 1 again (REORDER)
  $conn->query("SET @count = 0");
  $conn->query("UPDATE contact_messages SET id = @count := @count + 1");

  // Step 3: Reset AUTO_INCREMENT to the next number
  $conn->query("ALTER TABLE contact_messages AUTO_INCREMENT = 1");

  // Step 4: Refresh
  header("Location: admin-dashboard.php");
  exit();
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 40px; background: #f8f9fa; }
    h2 { text-align: center; margin-bottom: 20px; }
    table {
      width: 100%; border-collapse: collapse; background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 10px; text-align: left; border-bottom: 1px solid #ccc;
    }
    th { background-color: coral; color: white; }
    tr:hover { background: #f1f1f1; }
    .logout {
      display: block; margin: 20px auto; text-align: center;
    }
    .logout a {
      padding: 8px 16px; background: #dc3545; color: white;
      text-decoration: none; border-radius: 5px;
    }
  </style>
</head>
<body>

<h2>📩 Admin Dashboard – Contact Messages</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Received At</th>
  </tr>
  <?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row["id"] ?></td>
      <td><?= htmlspecialchars($row["name"]) ?></td>
      <td><?= htmlspecialchars($row["email"]) ?></td>
      <td><?= nl2br(htmlspecialchars($row["message"])) ?></td>
      <td>
  <?= $row["created_at"] ?>
  <br>
  <a href="admin-dashboard.php?delete_id=<?= $row["id"] ?>" onclick="return confirm('Are you sure you want to delete this message?');" style="color: red; font-size: 0.9em;">🗑️ Delete</a>
</td>

    </tr>
    <?php endwhile; ?>
  <?php else: ?>
    <tr><td colspan="5">No messages found.</td></tr>
  <?php endif; ?>
</table>

<div class="logout">
  <a href="logout.php">🚪 Logout</a>
</div>

</body>
</html>

<?php $conn->close(); ?>

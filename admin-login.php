<?php
session_start();

// ✅ Change these for your own admin login
$admin_email = "admin@lifestyle.com";
$admin_pass = "Myproject@21"; // Use a stronger password in real projects

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  if ($email === $admin_email && $password === $admin_pass) {
    $_SESSION["admin_logged_in"] = true;
    header("Location: admin-dashboard.php");
    exit();
  } else {
    $error = "Invalid email or password.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 50px; }
    .login-box {
      max-width: 400px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 { text-align: center; margin-bottom: 20px; }
    input[type="email"], input[type="password"] {
      width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;
    }
    button {
      background: coral; color: white; border: none; padding: 10px 20px;
      border-radius: 4px; cursor: pointer; width: 100%;
    }
    .error { color: red; text-align: center; margin-top: 10px; }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>🔐 Admin Login</h2>
    <form method="POST">
      <label>Email:</label>
      <input type="email" name="email" required>
      <label>Password:</label>
      <input type="password" name="password" required>
      <button type="submit">Login</button>
    </form>
    <?php if ($error): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>
  </div>
</body>
</html>

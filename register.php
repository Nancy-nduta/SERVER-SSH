<?php include('config.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <h2>Register</h2>
  <form method="POST" action="">
    <label>Username:</label><br>
    <input type="text" name="username" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit" name="register">Sign Up</button>
  </form>

<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "<p>✅ Registration successful. <a href='login.php'>Login</a></p>";
    } else {
        echo "<p>❌ Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>
</body>
</html>

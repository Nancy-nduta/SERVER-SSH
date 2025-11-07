<?php
include('config.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <h2>Login</h2>
  <form method="POST" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit" name="login">Login</button>
  </form>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit;
        } else {
            echo "<p>❌ Incorrect password</p>";
        }
    } else {
        echo "<p>❌ No user found with that email</p>";
    }
    $stmt->close();
}
?>
</body>
</html>

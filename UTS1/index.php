<?php
// Start session
session_start();

// Mock login credentials for simplicity
$validUsername = '';
$validPassword = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Basic validation
    if (empty($username) || empty($password)) {
        $error = "Must be filled";
    } elseif (strlen($password) > 6) {
        $error = "Password is more than 6 characters";
    } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)) {
        $error = "Password must be uppercase and lowercase";
    } else {
        // Check credentials
        if ($username == $validUsername && $password == $validPassword) {
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit;
        } else {
            $error = "Invalid credentials";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laundry XYZ</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Laundry XYZ</h2>
        <form method="POST" action="">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit">LOGIN</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </div>
</body>
</html>

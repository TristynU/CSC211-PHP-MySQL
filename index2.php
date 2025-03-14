<?php
session_start();
include("db.php");

if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'user') {
        header("Location: jobseeker_dashboard.php");
    } else {
        header("Location: employer_dashboard2.php");
    }
    exit();
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = $_POST['role'];
    $query = "SELECT * FROM users WHERE username = '$username' AND role = '$role'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $role;

            if ($role == 'user') {
                header("Location: jobseeker_dashboard.php");
            } else {
                header("Location: employer_dashboard2.php");
            }
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "User not found or incorrect role!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h1>Login to Job Portal</h1>

<?php
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
}
?>

<form action="index2.php" method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <label for="role">Role:</label><br>
    <select name="role" id="role" required>
        <option value="user">Jobseeker</option>
        <option value="employer">Employer</option>
    </select><br><br>

    <button type="submit" name="login">Login</button>
</form>

<p>Don't have an account? <a href="register2.php">Register Here</a></p>

</body>
</html>
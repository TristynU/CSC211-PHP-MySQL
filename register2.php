<?php
session_start();
include("db.php");

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = $_POST['role'];
    $company_name = isset($_POST['company_name']) ? mysqli_real_escape_string($conn, $_POST['company_name']) : null;
    $company_location = isset($_POST['company_location']) ? mysqli_real_escape_string($conn, $_POST['company_location']) : null;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password, email, role) 
              VALUES ('$username', '$hashed_password', '$email', '$role')";

    if (mysqli_query($conn, $query)) {
        $user_id = mysqli_insert_id($conn);
        
        if ($role == 'employer' && $company_name != null) {
            $company_query = "INSERT INTO companies (user_id, company_name, location) 
                  VALUES ('$user_id', '$company_name', '$location')";
            mysqli_query($conn, $company_query);
        }
        
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = $role;
        if ($role == 'employer') {
            header("Location: employer_dashboard2.php");
        } else {
            header("Location: jobseeker_dashboard.php");
        }
        exit();
    } else {
        $error = "Error during registration. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<h1>Register</h1>

<?php
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
}
?>

<form action="register2.php" method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <label for="role">Role:</label><br>
    <select id="role" name="role" required>
        <option value="user">Job Seeker</option>
        <option value="employer">Employer</option>
    </select><br><br>
    <div id="companyFields" style="display: none;">
        <label for="company_name">Company Name:</label><br>
        <input type="text" id="company_name" name="company_name"><br><br>

        <label for="company_location">Company Location:</label><br>
        <input type="text" id="company_location" name="company_location"><br><br>
    </div>

    <button type="submit" name="submit">Register</button>
</form>

<script>
    document.getElementById('role').addEventListener('change', function() {
        var role = this.value;
        if (role === 'employer') {
            document.getElementById('companyFields').style.display = 'block';
        } else {
            document.getElementById('companyFields').style.display = 'none';
        }
    });
</script>

</body>
</html>
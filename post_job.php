<?php
session_start();
include("db.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: employer_login2.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $query = "INSERT INTO jobs (user_id, title, description, salary, location, category, posted_at) 
              VALUES ('$user_id', '$title', '$description', '$salary', '$location', '$category', NOW())";

    if (mysqli_query($conn, $query)) {
        header("Location: employer_dashboard2.php");
        exit();
    } else {
        $error = "Error posting the job. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job</title>
</head>
<body>

<h1>Post a New Job</h1>
<p><a href="employer_dashboard2.php">Back to Dashboard</a></p>

<?php
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
}
?>

<form action="post_job.php" method="POST">
    <label for="title">Job Title:</label><br>
    <input type="text" id="title" name="title" required><br><br>

    <label for="description">Job Description:</label><br>
    <textarea id="description" name="description" rows="5" required></textarea><br><br>

    <label for="salary">Salary:</label><br>
    <input type="number" id="salary" name="salary" required><br><br>

    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" required><br><br>

    <label for="category">Category:</label><br>
    <select id="category" name="category" required>
        <option value="Technology">Technology</option>
        <option value="Healthcare">Healthcare</option>
        <option value="Marketing">Marketing</option>
        <option value="Finance">Finance</option>
        <option value="Education">Education</option>
        <option value="Other">Other</option>
    </select><br><br>

    <button type="submit" name="submit">Post Job</button>
</form>

</body>
</html>
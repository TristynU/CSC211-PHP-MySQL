<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: index2.php");
    exit();
}
$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobseeker Dashboard</title>
</head>
<body>

<h1>Welcome to your Dashboard, Jobseeker</h1>

<p><a href="logout2.php">Logout</a></p>

<h2>Available Job Postings</h2>

<?php
if (mysqli_num_rows($result) > 0) {
    while ($job = mysqli_fetch_assoc($result)) {
        echo "<div class='job-posting'>";
        echo "<p>" . htmlspecialchars($job['description']) . "</p>";
        echo "<p><strong>Posted on:</strong> " . $job['created_at'] . "</p>";
        echo "<p><strong>Status:</strong> " . ucfirst($job['status']) . "</p>";
        echo "<button><a href='apply.php?job_id=" . $job['id'] . "'>Apply</a></button>";
        echo "</div><br>";
    }
} else {
    echo "<p>No job postings available at the moment.</p>";
}
?>

</body>
</html>
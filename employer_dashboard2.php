<?php
session_start();
include("db.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: employer_login2.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id='$user_id' AND role='employer'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("Employer not found.");
}
$jobs_query = "SELECT * FROM jobs WHERE user_id='$user_id'";
$jobs_result = mysqli_query($conn, $jobs_query);

if (!$jobs_result) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
<p><a href="logout2.php">Logout</a></p>

<h2>Your Job Postings</h2>
<a href="post_job.php">Post a New Job</a><br><br>

<?php
if (mysqli_num_rows($jobs_result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Salary</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>";

    while ($job = mysqli_fetch_assoc($jobs_result)) {
        echo "<tr>
                <td>" . htmlspecialchars($job['description']) . "</td>
                <td>" . htmlspecialchars($job['location']) . "</td>
                <td>" . htmlspecialchars($job['salary']) . "</td>
                <td>" . htmlspecialchars($job['category']) . "</td>
                <td>
                    <a href='edit_job.php?id=" . $job['id'] . "'>Edit</a> |
                    <a href='delete_job.php?id=" . $job['id'] . "' onclick='return confirm(\"Are you sure you want to delete this job?\");'>Delete</a> |
                    <a href='view_applicants.php?job_id=" . $job['id'] . "'>View Applicants</a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "<p>You have not posted any jobs yet.</p>";
}
?>

</body>
</html>
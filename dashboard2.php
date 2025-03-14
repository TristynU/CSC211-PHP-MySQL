<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login2.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo $user['username']; ?>!</h1>

<h2>Your Job Postings</h2>

<?php
$query = "SELECT * FROM jobs ORDER BY posted_at DESC";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div><h3>" . $row['title'] . "</h3><p>" . $row['description'] . "</p></div><br>";
    }
} else {
    echo "<p>No job postings available.</p>";
}
?>

<a href="logout2.php">Logout</a>

</body>
</html>